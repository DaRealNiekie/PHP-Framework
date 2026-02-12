<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Entities\product;

use Doctrine\ORM\EntityManagerInterface;

use Framework\Controller\AbstractController;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em)
    {

    }

    public function index(): ResponseInterface
    {
        $repo = $this->em->getRepository(product::class);

        $products = $repo->findall();

        return $this->render("product/index", [
            "products" => $products
        ]);

    }

    public function show(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $product = $this->em->find(Product::class, $args["id"]);

        return $this->render("product/show", [
            "product" => $product
        ]);
    }

    public function create(ServerRequestInterface $reqeust): ResponseInterface
    {
        if ($reqeust->getMethod() === "POST") {
            $parameters = $reqeust->getParsedBody();

            $product = new product;

            $product->setName($parameters["name"]);
            $product->setDescription($parameters["description"]);
            $product->setSize((int) $parameters["size"]);

            $this->em->persist($product);

            $this->em->flush();

            return $this->redirect("/product/{$product->getid()}");
        }


        return $this->render("/product/new");
    }
}