<?php

namespace App\Repositories\Implementations;

use App\Repositories\ShoutRepository;
use App\Utils\Database;

class ShoutDatabaseImplementation implements ShoutRepository
{
    protected $db;

    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getConnection();   
    }

    public function getByAuthor($author, $limit)
    {
        
        $statement = "
            SELECT
                quote, author
            FROM
                quotes
            WHERE author = ?;
        ";

        try {
            
            $statement = $this->db->prepare($statement);
            $statement->execute(array($author));            
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            
            return $result;

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }


    }

}