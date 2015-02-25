<?php

require_once __DIR__ . '/../model/Flux.php';

/**
 * Class FluxGateway
 */
class FluxGateway
{
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insert(Flux $flux) {
        $stmt = $this->con->prepare('INSERT INTO Flux(url,date) VALUES(:url,:date)');

        $stmt->bindValue(':url',$flux->getUrl());
        $stmt->bindValue(':date',$flux->getDate());

        $stmt->execute();

        return $this->con->lastInsertId();
    }
}