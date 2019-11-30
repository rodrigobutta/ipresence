<?php
namespace App\Controllers;

use App\ApiController;


class ShoutController extends ApiController{

    private $source;
    private $config;
    private $repository;
    
    public function __construct($config, $source)
    {
        $this->source = $source;
        $this->config = $config;

        // i could play with reflection to build a really dynamic interfasce implementation according to sources, but for now, old fashion way
        // $reflect = new \ReflectionClass('App\Repositories\Implementations\ShoutDatabaseImplementation');
        $this->repository = new $this->config['datasource']; // new ShoutDatabaseImplementation();

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
