<?php

require_once __DIR__ . '/../model/Article.php';

/**
 * Class ArticleGateway
 */
class ArticleGateway
{
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insert(Article $article,$idFlux) {
        $stmt = $this->con->prepare('INSERT INTO Article(id_flux,lien,titre,description,date) VALUES(:id_flux,:lien,:titre,:description,:date)');

        $stmt->bindValue(':id_flux',$idFlux);
        $stmt->bindValue(':lien',$article->getLien());
        $stmt->bindValue(':titre',$article->getTitle());
        $stmt->bindValue(':description',$article->getDescription());
        $stmt->bindValue(':date',$article->getDate());

        $stmt->execute();

        return $this->con->lastInsertId();
    }

}