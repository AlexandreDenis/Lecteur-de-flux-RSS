<?php

require_once __DIR__ . '/../pdo/Connection.php';
require_once __DIR__ . '/../model/Flux.php';

class CommandAction
{

    /**
     * Add a new flux
     */
    public function addFlux($flux)
    {
        $con = Connection::getConnection();

        $fluxEntity = new Flux($flux,date("Y-m-d H:i"));
        $fluxEntity->save($con);
    }

}