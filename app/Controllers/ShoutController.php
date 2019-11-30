<?php
namespace App\Controllers;


class ShoutController {

    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
      
    }

    public function processRequest($request)
    {
        

        // $response = $this->unprocessableEntityResponse();
        $response = $this->notFoundResponse();

        // $result = [];
        // $response['header'] = 'HTTP/1.1 200 OK';
        // $response['body'] = json_encode($result);

        
        // header($response['header']);
        if ($response['body']) {
            echo $response['body'];
        }

    }


    private function unprocessableEntityResponse()
    {
        // $response['header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    private function notFoundResponse()
    {
        // $response['header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = json_encode([
            'error' => 'Not found'
        ]);
        return $response;
    }

}
