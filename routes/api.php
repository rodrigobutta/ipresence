<?php

$routing->with('/shout', function () use ($routing, $datasources) {

    $controller = new App\Controllers\ShoutController($datasources,'database');

    $routing->respond('GET', '/?', function ($request, $response) {
        return 'You might be forgotting the author..';
    });

    $routing->respond('GET', '/[:author]', function ($request, $response) use($controller){

        $controller->getByAuthor($request);

    });

});