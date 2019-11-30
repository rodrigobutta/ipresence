<?php
namespace App\Controllers;

use App\ApiController;


class ShoutController extends ApiController{
    
    private $repository;
    
    public function __construct($datasources, $datasource)
    {
        $this->repository = new $datasources[$datasource]; // ShoutInterface implementations
    }

    public function getByAuthor($request)
    {
        
        if(!$limit = $request->limit){            
            // return $this->unprocessableEntityResponse();       
            $limit = 2;
        }

        $author = $request->author;

        $result = new \stdClass();
        
        $items = $this->repository->getByAuthor($author,$limit);
        
        $result->items = $items;

        // return $this->notFoundResponse();

        $result->author = $request->author;

        $this->okResponse($result);

    }


}
