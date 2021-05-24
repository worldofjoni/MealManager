<?php

class DB {

    public static function connect()
    {
        $dsn = "mysql:dbname=".config()['dbName'].";host=".config()['dbHost'];
        $pdo = new PDO($dsn, config()['dbUser'], config()['dbPw']);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
    
    
}
