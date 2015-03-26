<?php

require_once __DIR__.'/../../pdo/Connection.php';
require_once __DIR__.'/../../dao/ArticleGateway.php';
require_once __DIR__.'/../../model/Article.php';

class DaoArticleTest extends PHPUnit_Framework_TestCase
{
    public function testInsertArticle()
    {
        $arrayConnection = parse_ini_file('connectionTest.txt');
        $dsn = $arrayConnection['database'].':host='.$arrayConnection['host'].';dbname='.$arrayConnection['dbname'];
        $con = new PDO($dsn, $arrayConnection['user'], $arrayConnection['password']);

        $articleGateway = new ArticleGateway($con);

        $articleGateway->insert(new Article('link', 'title', 'description', date('Y-m-d')), 1);

        $stmt = $con->prepare('SELECT COUNT(*) FROM Article');
        $stmt->execute();

        $this->assertEquals(1, $stmt->fetchColumn());

        $stmt = $con->prepare('DELETE FROM Article');
        $stmt->execute();
    }

    public function testFindAllArticle()
    {
        $arrayConnection = parse_ini_file('connectionTest.txt');
        $dsn = $arrayConnection['database'].':host='.$arrayConnection['host'].';dbname='.$arrayConnection['dbname'];
        $con = new PDO($dsn, $arrayConnection['user'], $arrayConnection['password']);

        $articleGateway = new ArticleGateway($con);

        $articleGateway->insert(new Article('link', 'title', 'description', date('Y-m-d')), 1);
        $array = $articleGateway->findAll();

        $this->assertEquals(1, count($array));

        $stmt = $con->prepare('DELETE FROM Article');
        $stmt->execute();
    }
}
