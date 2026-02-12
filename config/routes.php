<?php

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\WegenController;
use League\Route\Router;


return function (Router $router) {

    $router->get("/", [HomeController::class, "index"]);

    $router->get("/products", [ProductController::class, "index"]);

    $router->get("/product/{id:number}", [ProductController::class, "show"]);

    $router->map(["GET", "POST"], "/product/new", [ProductController::class, "create"]);

    $router->get("/wegen", [WegenController::class, "index"]);

    $router->get("/wegen/nieuw", [WegenController::class, "nieuw"]);

    $router->post("/wegen", [WegenController::class, "create"]);

    $router->get("/wegen/{id:number}", [WegenController::class, "show"]);

    $router->get("/wegen/{id:number}/bewerken", [WegenController::class, "edit"]);

    $router->post("/wegen/{id:number}/update", [WegenController::class, "update"]);

};