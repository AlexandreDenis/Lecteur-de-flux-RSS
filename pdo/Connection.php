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
            $dsn = 'mysql:host=localhost;dbname=adrien_calime_et_alexandre_denis_lecteur_rss';
            try {
                self::$con = new PDO($dsn, 'root', '');
            } catch(PDOException $e) {
                $fp = fopen('errorConnection.txt','w');
                fprintf($fp,'connection failed : '.$e->getMessage());
                fclose($fp);
            }
        }
        return self::$con;
    }

}