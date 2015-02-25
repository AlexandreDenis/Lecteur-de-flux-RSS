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

    public function findAll() {

        $arrayFlux = array();

        $stmt = $this->con->prepare('SELECT * from Flux');
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {

                array_push($arrayFlux,new Flux($row['url'],$row['date'],$row['id']));

            }
        }

        return $arrayFlux;
    }

    public function updateDate($date,$id) {
        $stmt = $this->con->prepare('UPDATE Flux SET date = :date WHERE id = :id');

        $stmt->bindValue(':date',$date);
        $stmt->bindValue(':id',$id);

        $stmt->execute();
    }
}