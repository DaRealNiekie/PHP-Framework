<?php
declare(strict_types=1);

namespace App\Controllers;

use Framework\Controller\AbstractController;

use Psr\Http\Message\ResponseInterface;

class NieuweWegenController extends AbstractController
{

    public function nieuwewegen(): ResponseInterface
    {
        $contents = $this->renderer->render("wegen/nieuw");

        $stream = $this->factory->createStream($contents);

        $response = $this->factory->createResponse(200);

    }

}