<?php

require_once __DIR__.'/../model/Feed.php';

/**
 * Class FeedGateway.
 */
class FeedGateway
{
    /**
     * @var the connection to the database
     */
    private $con;

    /**
     * construct a feedGateway.
     *
     * @param $con the connection to the database
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * insert a new feed into the database.
     *
     * @param Feed $feed the feed to insert
     *
     * @return the id of the new feed
     */
    public function insert(Feed $feed)
    {
        $stmt = $this->con->prepare('INSERT INTO Feed(url,date) VALUES(:url,:date)');

        $stmt->bindValue(':url', $feed->getUrl());
        $stmt->bindValue(':date', $feed->getDate());

        $stmt->execute();

        return $this->con->lastInsertId();
    }

    /**
     * get all feeds.
     *
     * @return array feeds
     */
    public function findAll()
    {
        $arrayFeed = array();

        $stmt = $this->con->prepare('SELECT * from Feed');
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                array_push($arrayFeed, new Feed($row['url'], $row['date'], $row['id']));
            }
        }

        return $arrayFeed;
    }

    /**
     * update the date of a feed.
     *
     * @param $date the new date
     * @param $id the id of the feed to update
     */
    public function updateDate($date, $id)
    {
        $stmt = $this->con->prepare('UPDATE Feed SET date = :date WHERE id = :id');

        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }

    /**
     * delete a feed.
     *
     * @param $idFeed the feed to delete
     */
    public function delete($idFeed)
    {
        $stmt = $this->con->prepare('DELETE FROM Feed WHERE id = :id');
        $stmt->bindValue(':id', $idFeed);
        $stmt->execute();
    }

    /**
     * delete all feeds.
     */
    public function deleteAll()
    {
        $stmt = $this->con->prepare('DELETE FROM Feed');
        $stmt->execute();
    }
}
