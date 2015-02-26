<?php

require_once __DIR__ . '/../dao/FeedGateway.php';

/**
 * Class Feed
 * representation of a feed RSS or ATOM.
 */
class Feed
{
    private $id;
    private $url;
    private $date;

    /**
     * construct a new feed
     * @param $url url of the feed
     * @param $date date of the feed
     * @param $id id of the feed
     */
    public function __construct($url, $date, $id)
    {
        $this->url = $url;
        $this->date = $date;
        $this->id = $id;
    }

    /**
     * save a feed
     * @param $con connection to the database
     */
    public function save($con)
    {
        $feedGateway = new FeedGateway($con);
        $this->id =  $feedGateway->insert($this);
    }

    /**
     * get id
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * get url
     * @return url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * get date
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }
}
