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

    public function saveFlux(Flux $flux) {
        $stmt = $this->con->prepare('insert into Flux values (:format) (:url) (:titre) (:description)');
        $stmt->bindValue(':format',$flux->getFormat());
        $stmt->bindValue(':url',$flux->getUrl());
        $stmt->bindValue(':titre',$flux->getTitre());
        $stmt->bindValue(':description',$flux->getDescription());
        $stmt->execute();

        return $this->con->lastInsertId();
    }
}