<?php
namespace app\database;

use PDO;

class ConnectionFactory
{
    public static function getConnection(): PDO
    {
        return new PDO("mysql:host=localhost;dbname=teste", "root", "");
    }
}
