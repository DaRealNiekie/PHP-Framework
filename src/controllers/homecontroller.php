<?php
 
declare(strict_types=1);
 
namespace App\Controllers;
 
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
 
class HomeController
{
    public function index(): Response
    {
        $stream = Utils::streamFor("Dit is de homepagina voor de zoutstrooimanagement!");
 
        $response = new Response();
 
        $response = $response->withBody($stream);
 
        return $response;
    }
}