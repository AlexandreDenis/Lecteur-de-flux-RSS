<?php

require_once __DIR__ . '/../dao/ArticleGateway.php';

/**
 * Class Article
 * representation of an article
 */
class Article
{
    private $id;
    private $lien;
    private $title;
    private $description;
    private $date;

    public function __construct($lien,$title,$description,$date) {
        $this->lien = $lien;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
    }

    public function getLien()
    {
        return $this->lien;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function save($con,$idFlux) {
        $articleGateway = new ArticleGateway($con);
        $this->id =  $articleGateway->insert($this,$idFlux);
    }

}