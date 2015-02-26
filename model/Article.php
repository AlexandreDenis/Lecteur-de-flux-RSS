<?php

require_once __DIR__.'/../dao/ArticleGateway.php';

/**
 * Class Article
 * representation of an article.
 */
class Article
{
    private $id;
    private $link;
    private $title;
    private $description;
    private $date;

    /**
     * create an article.
     *
     * @param $lien
     * @param $title
     * @param $description
     * @param $date
     */
    public function __construct($link, $title, $description, $date)
    {
        $this->link = $link;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
    }

    /**
     * get link.
     *
     * @return link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * get title.
     *
     * @return title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * get description.
     *
     * @return description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * get date.
     *
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * save an article.
     *
     * @param $con connection to the database
     * @param $idFeed reference to the feed
     */
    public function save($con, $idFeed)
    {
        $articleGateway = new ArticleGateway($con);
        $this->id =  $articleGateway->insert($this, $idFeed);
    }
}
