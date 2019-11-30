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
                author, quote
            FROM
                quotes;
        ";

        try {
            
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            
            return $result;

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }


    }

}