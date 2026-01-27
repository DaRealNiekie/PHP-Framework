<?php
declare(strict_types=1);

namespace App\Controllers;


use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;

class NieuweWegenController
{
    public function __construct(private ResponseFactoryInterface $factory)
    {

    }
    public function nieuwewegen(): ResponseInterface
    {
        $stream = $this->factory->createStream("dit is de nieuwe wegen pagina");

        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;
    }
}