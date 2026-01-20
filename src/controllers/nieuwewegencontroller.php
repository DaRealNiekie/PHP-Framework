<?php

declare(strict_types=1);

namespace App\Controllers;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;

class NieuweWegenController
{
    public function nieuwewegen(): Response
    {
        $stream = Utils::streamFor("hier maak je nieuwe wegen aan");

        $response = new Response();

        $response = $response->withBody($stream);

        return $response;

    }
}