<?php
namespace App\Controllers;

use App\ApiController;


class ShoutController extends ApiController{
    
    private $repository;
    
    public function __construct($datasources, $datasource)
    {
        $this->repository = new $datasources[$datasource]; // new ShoutDatabaseImplementation();
    }

    public function getByAuthor($request)
    {
        
        if(!$request->limit){
            return $this->unprocessableEntityResponse();
        }

        $result = new \stdClass();

        $items = $this->repository->getByAuthor('stevie',2);
        $result->items = $items;

        // return $this->notFoundResponse();

        $result->author = $request->author;

        $this->okResponse($result);

    }


}
