<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

use Symfony\Component\HttpFoundation\Request;

$app->post('/testPost', function (Request $request) use ($app) {
    $flux = $request->get("inputRss");

    return $app->json($flux, 201);

    //return $app->redirect('/views/index.php');
});

$app->get('/testGet', function () {
    $output = 'hey man';
    return $output;
});

$app->run();