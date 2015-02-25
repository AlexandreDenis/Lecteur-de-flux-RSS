<?php

require_once __DIR__ . '/../dao/FluxGateway.php';

/**
 * Class Flux
 * representation of a flux RSS or ATOM
 */
class Flux
{
    private $id;
    private $url;
    private $date;

    public function __construct($url,$date,$id) {
        $this->url = $url;
        $this->date = $date;
        $this->id = $id;
    }

    public function save($con) {
        $fluxGateway = new FluxGateway($con);
        $this->id =  $fluxGateway->insert($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getDate()
    {
        return $this->date;
    }

}