<?php
namespace App\Controllers\Api;

use App\Controllers\ApiController;


class ShoutController extends ApiController{
    
    private $repository;
    
    public function __construct($datasources, $datasource)
    {
        $this->repository = new $datasources[$datasource]; // ShoutInterface implementations
    }

    public function getByAuthor($request)
    {

        if(!$limit = $request->limit){                        
            $limit = 2; // return $this->unprocessableEntityResponse();       
        }

        $author = str_replace('-',' ',$request->author);

        $result = new \stdClass();
        $result->author = $author;
        $result->limit = $limit;
        
        $items = $this->repository->getByAuthor($author,$limit);
        // return $this->notFoundResponse();

        //shout!
        foreach($items as $key => $item){
            $items[$key]['quote'] = mb_strtoupper( rtrim(rtrim($item['quote'],'!'),'.') . '!');
        };

        $result->items = $items;

        $this->okResponse($result);
    }


}
