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

        // get the limit parameter, establish 2 for default, or reject if passed limit si more than 10
        if(!$limit = $request->limit){                        
            $limit = intval(getenv('LIMIT_DEFAULT'));
        }
        else{
            $maxLimit = intval(getenv('LIMIT_MAX'));
            if($limit>$maxLimit){
                return $this->unprocessableEntityResponse('Limit must be equal or less than ' . $maxLimit);       
            }
        }
        
        // sanitize author parameter
        $author = ltrim(rtrim(str_replace('-',' ',$request->author)));
        if(!$author || $author == ''){
            return $this->unprocessableEntityResponse('No author provided');       
        }

        // get the quotes from the repository
        $items = $this->repository->getByAuthor($author,$limit);
        if(!$items || sizeof($items)==0){
            return $this->notFoundResponse('No quotes found for ' . $author);       
        }
        
        //shout!
        foreach($items as $key => $item){
            $items[$key]['quote'] = mb_strtoupper( rtrim(rtrim($item['quote'],'!'),'.') . '!');
        };

        // $result = new \stdClass();
        // $result->author = $author;
        // $result->limit = $limit;
        // $result->items = $items;
        $result = $items;

        $this->okResponse($result);
    }


}
