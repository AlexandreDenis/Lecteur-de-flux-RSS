<?php

require_once __DIR__.'/../pdo/Connection.php';
require_once __DIR__ . '/../model/Feed.php';
require_once __DIR__ . '/../dao/FeedGateway.php';
require_once __DIR__.'/../dao/ArticleGateway.php';

/**
 * Class CommandAction
 * class called by the controller
 */
class CommandAction
{
    /**
     * Add a new feed.
     */
    public function addFeed($feed)
    {
        $con = Connection::getConnection();

        $feedEntity = new Feed($feed, date("Y-m-d H:i"), 0);
        $feedEntity->save($con);
    }

    /**
     * find all feeds
     * @return array feeds
     */
    public function findAllFeed()
    {
        $con = Connection::getConnection();
        $feed = new FeedGateway($con);

        return $feed->findAll();
    }

    /**
     * find all articles
     * @return array articles
     */
    public function findAllArticle()
    {
        $con = Connection::getConnection();
        $article = new ArticleGateway($con);

        return $article->findAll();
    }

    /**
     * delete a feed
     * @param $idFeed the feed to delete
     */
    public function deleteFeed($idFeed)
    {
        $con = Connection::getConnection();
        $feed = new FeedGateway($con);
        $feed->delete($idFeed);
    }

    /**
     * delete all feeds
     */
    public function deleteAllFeed()
    {
        $con = Connection::getConnection();
        $feed = new FeedGateway($con);
        $feed->deleteAll();
    }
}
