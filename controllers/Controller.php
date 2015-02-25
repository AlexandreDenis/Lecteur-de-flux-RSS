<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/CommandAction.php';

use Symfony\Component\HttpFoundation\Request;


$app = new Silex\Application();

/**
 * POST method to add a new flux
 */
$app->post('/addFeed', function (Request $request) use ($app) {

    $commandAction = new CommandAction();

    $flux = $request->get("inputRss");

    $commandAction->addFlux($flux);

    return $app->redirect('/PhpProject/views/flux.php');
});

$app->run();