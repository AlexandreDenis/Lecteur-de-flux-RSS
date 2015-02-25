<?php

require_once __DIR__ . '/../pdo/Connection.php';
require_once __DIR__ . '/../model/Flux.php';
use Symfony\Component\Console\Output\OutputInterface;

class CommandAction
{

    /**
     * Add a new flux
     */
    public function addFlux($flux)
    {
        $con = Connection::getConnection();

        $fluxEntity = new Flux($flux,date("Y-m-d H:i"),0);
        $fluxEntity->save($con);
    }

}