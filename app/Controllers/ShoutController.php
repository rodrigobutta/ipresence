<?php
namespace App\Controllers;


class ShoutController{

    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
      
    }

    public function getByAuthor($request)
    {
        

        // $response = $this->unprocessableEntityResponse();
        // $response = $this->notFoundResponse();

        // $result = $this->shoutRepository->findAll();
        $result = new \stdClass();
        $result->author = 'rrrrr';

        $this->okResponse($result);

    }

    private function okResponse($result)
    {
        // $response['header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);  
        return $this->returnResponse($response);
    }

    private function unprocessableEntityResponse()
    {
        // $response['header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $this>returnResponse($response);
    }

    private function notFoundResponse()
    {
        // $response['header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = json_encode([
            'error' => 'Not found'
        ]);
        return $this>returnResponse($response);
    }

    private function returnResponse($response)
    {
        // header($response['header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

}
