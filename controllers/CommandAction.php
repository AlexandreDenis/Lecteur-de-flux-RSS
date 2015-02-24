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

        $fluxEntity = new Flux(0,"url","titre",$flux);
        $fluxEntity->save($con);
    }

}