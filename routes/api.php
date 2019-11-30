<?php

// var_dump($config);


$routing->with('/shout', function () use ($routing, $config) {

    $controller = new App\Controllers\ShoutController($config,'database');

    $routing->respond('GET', '/?', function ($request, $response) {
        return 'You might be forgotting the author..';
    });

    $routing->respond('GET', '/[:author]', function ($request, $response) use($controller){

        $controller->getByAuthor($request);

    });

});