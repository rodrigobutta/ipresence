<?php
namespace App\Utils;

class Database {

    private $connection = null;

    public function __construct()
    {
        $this->connectToMySql();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    // i'm putting this method as a way to abstract the database used, this class could have several type of connections if the decoupling is done well
    private function connectToMySql()
    {        
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');        
        $user = getenv('DB_USERNAME');
        $pass = getenv('DB_PASSWORD');
        $db   = getenv('DB_DATABASE');

        try {
            $this->connection = new \PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }



}