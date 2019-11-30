<?php

namespace App\Repositories\Implementations;

use App\Repositories\ShoutRepository;
use App\Cache\Implementations\FileCache;

class ShoutJsonImplementation implements ShoutRepository
{

    public function getByAuthor($author, $limit)
    {

        $cache = new FileCache(__FUNCTION__, $author, $limit);
        if($cache->exists()){            
            return $cache->get();
        }
        
        $jsonFile = file_get_contents("./quotes.json");
        
        $items = json_decode($jsonFile, true);        
        $items = $items['quotes'];
        $items = array_filter($items, function($el) use($author){
            return strtolower($el['author']) == strtolower($author);
        });
        
        return $cache->put($items);

    }

}