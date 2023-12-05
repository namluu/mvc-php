<?php
declare(strict_types=1);

namespace Core;
use App\Config;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $host = Config::DB_HOST;
            $dbname = Config::DB_NAME;
            $username = Config::DB_USER;
            $password = Config::DB_PASS;

            try {
                $db = new \PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 
                                $username, $password);
                // throw an exception when an error occurs
                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                return $db;
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
