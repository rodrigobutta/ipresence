<?php
namespace App\Controllers;

use App\ApiController;

class ShoutController extends ApiController{

    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
      
    }

    public function getByAuthor($request)
    {
        

        // return $this->unprocessableEntityResponse();
        // return $this->notFoundResponse();

        // $result = $this->shoutRepository->findAll();
        $result = new \stdClass();
        $result->author = 'rrrrr';

        $this->okResponse($result);

    }


}
