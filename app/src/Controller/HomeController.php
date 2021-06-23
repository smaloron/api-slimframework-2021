<?php


namespace App\Controller;


use Slim\Psr7\Response;

class HomeController
{

    public function test(Response $response){
        $response->getBody()->write("Un test");
        return $response;
    }

    public function hello(Response $response, string $name){
        $response->getBody()->write("Hello $name");
        return $response;
    }

    public function addition(Response $response, string $n1, string $n2){
        $response->getBody()->write("Le résultat est : ". ($n1 + $n2));
        return $response;
    }

}