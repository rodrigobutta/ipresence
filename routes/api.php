<?php

use App\Controllers\Api\ShoutController;


$routing->with('/shout', function () use ($routing, $datasources) {

    $controller = new ShoutController($datasources,'database');

    $routing->respond('GET', '/?', function ($request, $response) {
        return 'You might be forgeting the author..';
    });

    $routing->respond('GET', '/[:author]', function ($request, $response) use($controller){

        $controller->getByAuthor($request);

    });

});