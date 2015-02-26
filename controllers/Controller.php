<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/CommandAction.php';

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

/*
 * POST method to add a new feed
 */
$app->post('/addFeed', function (Request $request) use ($app) {

    $commandAction = new CommandAction();

    $feed = $request->get("inputRss");

    if (!filter_var($feed, FILTER_VALIDATE_URL) === false) {
        $commandAction->addFeed($feed);
    }

    return $app->redirect('/PhpProject/views/feed.php');
});

/*
 * POST method to delete one feed
 */
$app->post('/deleteFeed', function (Request $request) use ($app) {
    $commandAction = new CommandAction();

    $idFeed = $request->get("idFeed");

    $commandAction->deleteFeed($idFeed);

    return $app->redirect('/PhpProject/views/feed.php');
});

/*
 * POST method to delete all feeds
 */
$app->post('/deleteAllFeed', function (Request $request) use ($app) {
    $commandAction = new CommandAction();

    $commandAction->deleteAllFeed();

    return $app->redirect('/PhpProject/views/feed.php');
});

$app->run();
