<?php
namespace App\Controllers;

// inherited class in all the API controllers, for now it's only the shout one.
class ApiController{

    // Parse the Class to json and return a 200 for the api
    public function okResponse($result)
    {
        // $response['header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);  
        return $this->returnResponse($response);
    }

    // if the input is wrong and i coulnd't catch it in the route module, may be the controller needs to handle it
    public function unprocessableEntityResponse()
    {
        // $response['header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $this->returnResponse($response);
    }

    // is not a 404 (already catched in the routes module), this one is for not found authors or rejections like that
    public function notFoundResponse()
    {
        // $response['header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = json_encode([
            'error' => 'Not found'
        ]);
        return $this->returnResponse($response);
    }

    // common return for every type of returning in the api
    private function returnResponse($response)
    {
        // header($response['header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

}
