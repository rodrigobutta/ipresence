<?php

use App\Controllers\Api\ShoutController;


function dispatch($args){
    global $datasources;

    switch ($args[1]) {
        case 'shout':
            
            $controller = new ShoutController($datasources,'database');

            $request = new stdClass();

            $request->author = null;
            if (isset($args[2])) {
                $request->author = $args[2];
            }

            $request->limit = null;
            if (isset($args[3])) {
                $request->limit = $args[3];
            }

            $controller->getByAuthor($request);

            echo 'route ok';
            break;
        
        default:
            echo "HTTP/1.1 404 Not Found";
            exit();
            break;
    }

}