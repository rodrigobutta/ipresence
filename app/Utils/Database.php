<?php
namespace App\Utils;

class Database {

    private $connection = null;

    public function __construct()
    {
        $this->connectToMySql(); // MySql for test poruposes (simple to implement) but it could be mongo, firebase, etc
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

            echo 'MySql database connection ok!';
            
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }



}