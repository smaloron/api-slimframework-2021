<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


use App\Controller\HomeController;
use DI\Bridge\Slim\Bridge;
use DI\ContainerBuilder;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

require "../vendor/autoload.php";

// Création du conteneur de dépendances
$builder = new ContainerBuilder();
$container = $builder->build();

// Création de l'application
// avec la classe Bridge qui permet de passer un container en argument
$app = Bridge::create($container);

// Création des routes

$app->get("/test", [HomeController::class, "test"]);

$app->get("/hello/{name}", [HomeController::class, "hello"]);

$app->get("/addition/{n1}/{n2}", [HomeController::class, "addition"]);

$app->get("/user", function (Request $request, Response $response){
    $user = [
            "userName" => "Joe User",
            "role" => "user",
            "id" => 1
    ];
    $json = json_encode($user);
    $response->getBody()->write($json);
    return $response->withHeader("Content-type", "application/json")
                    ->withStatus(200);
});

/************************************
 *  API Personnes
 ************************************/
$app->post("/person", [\App\Controller\PersonController::class, "insert"]);

// Lancement de l'application
$app->run();

