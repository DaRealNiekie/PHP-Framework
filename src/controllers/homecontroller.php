<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Entities\Weg;
use Doctrine\ORM\EntityManagerInterface;
use Framework\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;

class HomeController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function index(): ResponseInterface
    {
        $repo = $this->em->getRepository(Weg::class);
        $wegen = $repo->findAll();

        $totaalStrooiBeurten = 0;
        $weerCache = [];
        $laatsteStatus = "Geen data";
        $laatsteKop = "Onbekend";

        foreach ($wegen as $weg) {
            $locatie = $weg->getLocatie();

            if (!isset($weerCache[$locatie])) {
                $weerCache[$locatie] = $this->getWeatherData($locatie);
            }

            $temp = (float) $weerCache[$locatie]['temp'];
            $totaalStrooiBeurten += $this->berekenStrooiBeurten($temp);

            $laatsteStatus = $weerCache[$locatie]['lText'];
            $laatsteKop = $weerCache[$locatie]['lkop'];
        }

        return $this->render("home/index", [
            'totaalStrooiBeurten' => $totaalStrooiBeurten,
            'aantalWegen' => count($wegen),
            'lText' => $laatsteStatus,
            'lkop' => $laatsteKop
        ]);
    }

    private function berekenStrooiBeurten(float $temp): int
    {
        $t = (int) round($temp);
        if ($t <= -8)
            return 3;
        if ($t <= -4)
            return 2;
        if ($t <= 8)
            return 1;
        return 0;
    }

    private function getWeatherData(string $location): array
    {
        $apiKey = $_ENV["weerlive_api_key"] ?? "demo";
        $url = "https://weerlive.nl/api/weerlive_api_v2.php?key=" . urlencode($apiKey) . "&locatie=" . urlencode($location);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($ch);

        $data = $response ? json_decode((string) $response, true) : null;

        if (isset($data['liveweer'][0])) {
            return [
                'temp' => (float) $data['liveweer'][0]['temp'],
                'lkop' => $data['liveweer'][0]['lkop'] ?? 'Actueel',
                'lText' => $data['liveweer'][0]['ltekst'] ?? 'Ok'
            ];
        }
        return ['temp' => 9.0, 'lkop' => 'Onbekend', 'lText' => 'Geen verbinding'];
    }
}