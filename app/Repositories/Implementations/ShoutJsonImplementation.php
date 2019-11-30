<?php

namespace App\Repositories\Implementations;

use App\Repositories\ShoutRepository;

class ShoutJsonImplementation implements ShoutRepository
{

    public function getByAuthor($author, $limit)
    {
        
        $jsonFile = file_get_contents("./quotes.json");
        
        $items = json_decode($jsonFile, true);        
        $items = $items['quotes'];
        $items = array_filter($items, function($el) use($author){
            return strtolower($el['author']) == strtolower($author);
        });
        
        return $items;

    }

}