<?php

/**
 * Class Connection.
 */
class Connection extends PDO
{
    /**
     * connection to the database.
     */
    private static $con = null;

    /**
     * get the connection to the database.
     *
     * @return the connection to the database
     */
    public static function getConnection()
    {
        if (is_null(self::$con)) {
            $arrayConnection = parse_ini_file('connection.txt');
            $dsn = $arrayConnection['database'].':host='.$arrayConnection['host'].';dbname='.$arrayConnection['dbname'];
            try {
                self::$con = new PDO($dsn, $arrayConnection['user'], $arrayConnection['password']);
            } catch (PDOException $e) {
                $fp = fopen('connectionFailed.txt', 'w');
                fprintf($fp, 'Connection failed : '.$e->getMessage());
                fclose($fp);
            }
        }

        return self::$con;
    }
}
