<?php

require_once __DIR__.'/CommandAction.php';

$commandAction = new CommandAction();

$arrayFeed = $commandAction->findAllFeed();
