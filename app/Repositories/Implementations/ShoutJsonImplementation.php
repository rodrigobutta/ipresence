<?php

namespace App\Repositories\Implementations;

use App\Repositories\ShoutRepository;

class ShoutJsonImplementation implements ShoutRepository
{

    public function getByAuthor($author, $limit)
    {
        
        $jsonFile = file_get_contents("./quotes.json");
        
        $items = json_decode($jsonFile, true);

        // var_dump($items);
        // exit();
        $items = $items['quotes'];
        
        return $items;

    }

}