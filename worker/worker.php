#!/usr/bin/env php
<?php

/**
 * get all flux in database
 *
 * for each flux
 *      get the rss xml file associated
 *      for each article with a date superior of the flux
 *          insert the article into the database
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/GreetCommand.php';

use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new GreetCommand());
$application->run();