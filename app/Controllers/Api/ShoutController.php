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

        $author = $request->author;

        $result = new \stdClass();
        $result->author = $author;
        $result->limit = $limit;
        
        $items = $this->repository->getByAuthor($author,$limit);
        // return $this->notFoundResponse();

        $this->shout($items);
        $result->items = $items;

        $this->okResponse($result);
    }

    private function shout(&$arr){
        foreach ($arr as $key => $field) {
            $arr[$key]->quote = rtrim($arr[$key]->quote,'!') . "!";            
        }
    }

}
