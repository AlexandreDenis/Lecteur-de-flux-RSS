<?php

require_once __DIR__ . '/../pdo/Connection.php';

class CommandAction
{

    /**
     * Add a new flux
     */
    public function addFlux($flux)
    {
        $con = Connection::getConnection();
    }

}