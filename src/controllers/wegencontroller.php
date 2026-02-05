<?php
declare(strict_types=1);

namespace App\Controllers;

use Framework\Controller\AbstractController;

use Psr\Http\Message\ResponseInterface;

class WegenController extends AbstractController
{

    public function wegen(): ResponseInterface
    {
        return $this->render("wegen/index");

    }
    public function nieuwewegen(): ResponseInterface
    {
        $contents = $this->renderer->render("wegen/nieuw");

        $stream = $this->factory->createStream($contents);

        $response = $this->factory->createResponse(200);

        $response = $response->withBody($stream);

        return $response;
    }
}