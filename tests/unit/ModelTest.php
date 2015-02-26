<?php

require_once __DIR__.'/../../model/Feed.php';
require_once __DIR__.'/../../model/Article.php';

class ModelTest extends PHPUnit_Framework_TestCase
{

    public function testNewFeed()
    {
        $feed = new Feed("url","date",1);

        $this->assertEquals("url",$feed->getUrl());
        $this->assertEquals("date",$feed->getDate());
        $this->assertEquals(1,$feed->getId());
    }

    public function testNewArticle()
    {
        $article = new Article("link","title","description","date");

        $this->assertEquals("link",$article->getLink());
        $this->assertEquals("title",$article->getTitle());
        $this->assertEquals("description",$article->getDescription());
        $this->assertEquals("date",$article->getDate());
    }
}