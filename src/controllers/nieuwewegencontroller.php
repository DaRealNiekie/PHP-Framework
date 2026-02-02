<?php
declare(strict_types=1);

namespace App\Controllers;


use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Framework\Template\RendererInterface;

class NieuweWegenController
{
    public function __construct(
        private ResponseFactoryInterface $factory,
        private RendererInterface $renderer
    ) {

    }
    public function nieuwewegen(): ResponseInterface
    {
        $contents = $this->renderer->render("wegennieuw/index");

        $stream = $this->factory->createStream($contents);

        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;
    }
}