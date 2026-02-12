<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Entities\Weg;
use Doctrine\ORM\EntityManagerInterface;
use Framework\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class WegenController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function index(): ResponseInterface
    {
        $wegen = $this->em->getRepository(Weg::class)->findAll();
        return $this->render('wegen/index', ['wegen' => $wegen]);
    }

    // TOEVOEGEN: Toont het formulier voor een nieuwe weg
    public function nieuw(): ResponseInterface
    {
        return $this->render('wegen/nieuw');
    }

    public function create(ServerRequestInterface $request): ResponseInterface
    {
        $params = $request->getParsedBody() ?? [];

        $weg = new Weg();
        $this->fillWegData($weg, $params);

        $this->em->persist($weg);
        $this->em->flush();

        return $this->redirect('/wegen/' . $weg->getId());
    }

    // TOEVOEGEN: Toont de details van één weg
    public function show(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $id = (int) ($args['id'] ?? 0);
        $weg = $this->em->find(Weg::class, $id);

        if (!$weg) {
            return $this->render('errors/404.html');
        }

        return $this->render('wegen/show', ['weg' => $weg]);
    }

    // TOEVOEGEN: Toont het bewerk-formulier
    public function edit(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $id = (int) ($args['id'] ?? 0);
        $weg = $this->em->find(Weg::class, $id);

        if (!$weg) {
            return $this->render('errors/404.html');
        }

        return $this->render('wegen/edit', ['weg' => $weg]);
    }

    public function update(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $weg = $this->em->find(Weg::class, (int) $args['id']);
        if (!$weg) {
            return $this->render('errors/404.html');
        }

        $this->fillWegData($weg, $request->getParsedBody() ?? []);
        $this->em->flush();

        return $this->redirect('/wegen/' . $weg->getId());
    }

    private function fillWegData(Weg $weg, array $params): void
    {
        $weg->setNaam(trim((string) ($params['naam'] ?? $weg->getNaam())));
        $weg->setLocatie(trim((string) ($params['locatie'] ?? $weg->getLocatie())));
        $weg->setStrooiduur((int) ($params['strooiduur'] ?? 0));
        $weg->setWeglengte((int) ($params['weglengte'] ?? 0));

        $weg->setFreq0((int) ($params['0_temperatuur'] ?? 0));
        $weg->setFreqM5((int) ($params['-5_temperatuur'] ?? 0));
        $weg->setFreqM10((int) ($params['-10_temperatuur'] ?? 0));
        $weg->setHuidigeTemperatuur((int) ($params['huidige_temperatuur'] ?? 0));

    }
}