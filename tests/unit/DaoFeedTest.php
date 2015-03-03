<?php

require_once __DIR__.'/../../pdo/Connection.php';
require_once __DIR__.'/../../dao/FeedGateway.php';
require_once __DIR__.'/../../model/Feed.php';

class DaoFeedTest extends PHPUnit_Framework_TestCase {

    public function testInsertFeed() {
        $arrayConnection = parse_ini_file('connectionTest.txt');
        $dsn = $arrayConnection['database'].':host='.$arrayConnection['host'].';dbname='.$arrayConnection['dbname'];
        $con = new PDO($dsn, $arrayConnection['user'], $arrayConnection['password']);

        $feedGateway = new FeedGateway($con);

        $feedGateway->insert(new Feed("url",date('Y-m-d'),1));

        $stmt = $con->prepare('SELECT COUNT(*) FROM Feed');
        $stmt->execute();

        $this->assertEquals(1, $stmt->fetchColumn());

        $stmt = $con->prepare('DELETE FROM Feed');
        $stmt->execute();
    }

    public function testFindAllFeed() {
        $arrayConnection = parse_ini_file('connectionTest.txt');
        $dsn = $arrayConnection['database'].':host='.$arrayConnection['host'].';dbname='.$arrayConnection['dbname'];
        $con = new PDO($dsn, $arrayConnection['user'], $arrayConnection['password']);

        $feedGateway = new FeedGateway($con);

        $feedGateway->insert(new Feed("url",date('Y-m-d'),1));
        $array = $feedGateway->findAll();

        $this->assertEquals(1, count($array));

        $stmt = $con->prepare('DELETE FROM Feed');
        $stmt->execute();
    }

    public function testUpdateFeed() {
        $arrayConnection = parse_ini_file('connectionTest.txt');
        $dsn = $arrayConnection['database'].':host='.$arrayConnection['host'].';dbname='.$arrayConnection['dbname'];
        $con = new PDO($dsn, $arrayConnection['user'], $arrayConnection['password']);

        $feedGateway = new FeedGateway($con);

        $idFeed = $feedGateway->insert(new Feed("url",date('Y-m-d'),1));

        $newDate  = date('Y-m-d',strtotime("2011-01-07"));
        $feedGateway->updateDate($newDate,$idFeed);

        $array = $feedGateway->findAll();

        $this->assertEquals($newDate.' 00:00:00', array_values($array)[0]->getDate());

        $stmt = $con->prepare('DELETE FROM Feed');
        $stmt->execute();
    }

    public function testDeleteFeed() {
        $arrayConnection = parse_ini_file('connectionTest.txt');
        $dsn = $arrayConnection['database'].':host='.$arrayConnection['host'].';dbname='.$arrayConnection['dbname'];
        $con = new PDO($dsn, $arrayConnection['user'], $arrayConnection['password']);

        $feedGateway = new FeedGateway($con);

        $idFeed1 = $feedGateway->insert(new Feed("url",date('Y-m-d'),1));
        $idFeed2 = $feedGateway->insert(new Feed("url2",date('Y-m-d'),2));

        $feedGateway->delete($idFeed1);

        $array = $feedGateway->findAll();

        $this->assertEquals(1,count($array));

        $stmt = $con->prepare('DELETE FROM Feed');
        $stmt->execute();
    }

    public function testDeleteAllFeed() {
        $arrayConnection = parse_ini_file('connectionTest.txt');
        $dsn = $arrayConnection['database'].':host='.$arrayConnection['host'].';dbname='.$arrayConnection['dbname'];
        $con = new PDO($dsn, $arrayConnection['user'], $arrayConnection['password']);

        $feedGateway = new FeedGateway($con);

        $feedGateway->insert(new Feed("url",date('Y-m-d'),1));
        $feedGateway->insert(new Feed("url2",date('Y-m-d'),2));

        $feedGateway->deleteAll();

        $array = $feedGateway->findAll();

        $this->assertEquals(0,count($array));

        $stmt = $con->prepare('DELETE FROM Feed');
        $stmt->execute();
    }

}