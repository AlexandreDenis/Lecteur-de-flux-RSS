<?php

require_once __DIR__ . '/../dao/FluxGateway.php';

/**
 * Class Flux
 * representation of a flux RSS or ATOM
 */
class Flux
{
    private $id;
    private $format;
    private $url;
    private $titre;
    private $description;

    private $listArticle;

    public function __construct($format,$url,$titre,$description) {
        $this->description = $description;
        $this->format = $format;
        $this->url = $url;
        $this->titre = $titre;
    }

    public function save($con) {
        $fluxGateway = new FluxGateway($con);
        $this->id =  $fluxGateway->saveFlux($this);
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

}