#!/usr/bin/env php
<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/WorkerCommand.php';

use Symfony\Component\Console\Application;

/*
 * to launch the worker
 * php worker/worker.php workerFeed
 */

$application = new Application();
$application->add(new WorkerCommand());
$application->run();
