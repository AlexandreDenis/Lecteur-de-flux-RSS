<?php

/**
 * Class Connection
 */
class Connection extends PDO
{
    /**
     * connection to the database
     */
    private static $con = null;

    /**
     * get the connection to the database
     * @return the connection to the database
     */
    public static function getConnection()
    {
        if (is_null(self::$con)) {
            echo "toto";
            $dsn = 'mysql:host=localhost;dbname=test';
            echo "toto";
            self::$con = new PDO($dsn, 'root', '');
            echo "toto";
        }
        return self::$con;
    }

}