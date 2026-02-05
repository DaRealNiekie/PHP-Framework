<?php
declare(strict_types=1);

namespace App\Controllers;

use Framework\Controller\AbstractController;

use Psr\Http\Message\ResponseInterface;

class NieuweWegenController extends AbstractController
{

    public function nieuwewegen(): ResponseInterface
    {
        return $this->render("wegen/nieuw");

    }

}