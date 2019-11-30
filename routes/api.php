<?php

$routing->with('/shout', function () use ($routing) {

    $routing->respond('GET', '/?', function ($request, $response) {
        return 'You might be forgotting the author..';
    });

    $routing->respond('GET', '/[:author]', function ($request, $response) {
        return 'Shout for ' . $request->author;
    });

});