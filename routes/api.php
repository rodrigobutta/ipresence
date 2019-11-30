<?php

$routing->with('/shout', function () use ($routing, $db) {

    $controller = new App\Controllers\ShoutController($db);

    $routing->respond('GET', '/?', function ($request, $response) {
        return 'You might be forgotting the author..';
    });

    $routing->respond('GET', '/[:author]', function ($request, $response) use($controller){
        
        // return 'Shout for ' . $request->author;
        
        $controller->processRequest($request);

    });

});