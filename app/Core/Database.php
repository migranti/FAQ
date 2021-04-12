<?php

namespace Core;

use PDO;

class Database
{

    public $database;

    public $errors;

    private static $dbInstance = null;


    private function __construct()
    {

        $dsn = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8';

        [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            $this->database = new \PDO($dsn, DB_USERNAME, DB_PASSWORD);
        } catch (\PDOException $ex) {
            $this->errors = $ex;
        }
    }


    public static function connect()
    {
        if (!isset(self::$dbInstance)) {
            self::$dbInstance = new self();
        }

        return self::$dbInstance;
    }



    public function __clone()
    {
    }


    public function __wakeup()
    {
    }
}
