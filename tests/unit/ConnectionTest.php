<?php

require_once __DIR__.'/../../pdo/Connection.php';

class ConnectionTest extends PHPUnit_Framework_TestCase
{
    public function testConnection()
    {
        $this->assertNotNull(Connection::getConnection());
    }
}
