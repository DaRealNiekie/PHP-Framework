<?php


declare(strict_types=1);

namespace App\Controllers;


use GuzzleHttp\Psr7\Utils;
use Nyholm\Psr7\Response as NyholmResponse;
use Psr\Http\Message\ResponseInterface;

class HomeController
{
    public function index(): ResponseInterface
    {
        $stream = Utils::streamFor("Dit is de homepagina voor de zoutstrooimanagement!");

        $response = new NyholmResponse;

        $response = $response->withBody($stream);

        return $response;

    }
}