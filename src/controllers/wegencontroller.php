<?php


declare(strict_types=1);

namespace App\Controllers;


use GuzzleHttp\Psr7\Utils;
use Nyholm\Psr7\Response as NyholmResponse;
use Psr\Http\Message\ResponseInterface;

class WegenController
{
    public function wegen(): ResponseInterface
    {
        $stream = Utils::streamFor("hier zie je alle wegen!");

        $response = new NyholmResponse;

        $response = $response->withBody($stream);

        return $response;

    }
}