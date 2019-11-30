<?php

use App\Controllers\Api\ShoutController;


$routing->with('/shout', function () use ($routing, $datasources) {

    // the sources are temporaly defined here, but in real life there might be some dispatcher or controller in another layer
    $controller = new ShoutController($datasources, getenv('SOURCE'));

    $routing->respond('GET', '/?', function ($request, $response) {
        return 'You might be forgeting the author..';
    });

    $routing->respond('GET', '/[:author]', function ($request, $response) use($controller){

        $controller->getByAuthor($request);

    });

});