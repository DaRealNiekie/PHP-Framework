<?php

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\WegenController;
use league\Route\Router;


return function (router $router) {

    $router->get("/", [HomeController::class, "index"]);

    $router->get("/products", [ProductController::class, "index"]);

    $router->get("/product/{id:number}", [ProductController::class, "show"]);

    $router->map(["GET", "POST"], "/product/new", [ProductController::class, "create"]);

    $router->get("/wegen", [WegenController::class, "wegen"]);

    $router->get('/wegen/nieuw', [WegenController::class, 'nieuwewegen']);
};