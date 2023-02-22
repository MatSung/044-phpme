<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';

// pakeiciau nginx 
// location / {
//     # autoindex on;
//     try_files $uri /index.php$is_args$args;  <---
// }


// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('<a href="/hello/world">Try /hello/world</a>');
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->post('/store/orders', function (Request $request, Response $response, $args) {
    $data =
        [
            "id" => 0,
            "item_id" => 0,
            "quantity" => 0,
            "shipDate" => "2023-02-22T18:36:40.815Z",
            "status" => "placed",
            "complete" => false
        ];
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/store/orders/{id}', function (Request $request, Response $response, $args) {
    $data =
        [
            "id" => $args['id'],
            "item_id" => 0,
            "quantity" => 0,
            "shipDate" => "2023-02-22T18:36:40.815Z",
            "status" => "placed",
            "complete" => false
        ];
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->delete('/store/orders/{id}', function (Request $request, Response $response, $args) {
    $response->withStatus(200);
    return $response;
});

$app->post('/users', function (Request $request, Response $response, $args) {
    $data =
        [
            "id" => 0,
            "username" => "string",
            "firstName" => "string",
            "lastName" => "string",
            "email" => "string",
            "password" => "string",
            "phone" => "string",
            "userStatus" => 0
        ];
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/users/{username}', function (Request $request, Response $response, $args) {
    $data =
        [
            "id" => 0,
            "username" => $args['username'],
            "firstName" => "string",
            "lastName" => "string",
            "email" => "string",
            "password" => "string",
            "phone" => "string",
            "userStatus" => 0
        ];
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->put('/users/{username}', function (Request $request, Response $response, $args) {
    $data =
        [
            "id" => 0,
            "username" => $args['username'],
            "firstName" => "string",
            "lastName" => "string",
            "email" => "string",
            "password" => "string",
            "phone" => "string",
            "userStatus" => 0
        ];
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->delete('/users/{username}', function (Request $request, Response $response, $args) {
    $response->withStatus(200);
    return $response;
});

$app->run();
