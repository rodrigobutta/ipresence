<?php

namespace App\Repositories\Implementations;

use App\Repositories\ShoutRepository;
use App\Utils\Database;
use App\Utils\FileCache;

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

        $cache = new FileCache(__FUNCTION__, $author, $limit);
        if($cache->exists()){            
            return $cache->get();
        }
        

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
            $items = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $cache->put($items);

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }


    }

}