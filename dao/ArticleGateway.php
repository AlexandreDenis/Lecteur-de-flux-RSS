<?php

require_once __DIR__.'/../model/Article.php';

/**
 * Class ArticleGateway.
 */
class ArticleGateway
{
    /**
     * @var the connection to the database
     */
    private $con;

    /**
     * construct an articleGateway.
     *
     * @param $con the connection to the database
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * insert a new article into the database.
     *
     * @param Article $article the article to insert
     * @param $idFeed the feed associated to the article
     *
     * @return id of the new article
     */
    public function insert(Article $article, $idFeed)
    {
        $stmt = $this->con->prepare('INSERT INTO Article(id_feed,link,title,description,date) VALUES(:id_feed,:link,:title,:description,:date)');

        $stmt->bindValue(':id_feed', $idFeed);
        $stmt->bindValue(':link', $article->getLink());
        $stmt->bindValue(':title', $article->getTitle());
        $stmt->bindValue(':description', $article->getDescription());
        $stmt->bindValue(':date', $article->getDate());

        $stmt->execute();

        return $this->con->lastInsertId();
    }

    /**
     * get all articles from the database.
     *
     * @return array articles
     */
    public function findAll()
    {
        $arrayArticle = array();

        $stmt = $this->con->prepare('SELECT * FROM Article ORDER BY date DESC LIMIT 50');
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                array_push($arrayArticle, new Article($row['link'], $row['title'], $row['description'], $row['date']));
            }
        }

        return $arrayArticle;
    }
}
