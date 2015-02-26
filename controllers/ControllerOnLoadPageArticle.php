<?php

require_once __DIR__.'/CommandAction.php';

/*
 * get all articles
 */

$commandAction = new CommandAction();
$arrayArticle = $commandAction->findAllArticle();
