<?php
require "../bootstrap.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if (!$uri[1]) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

switch ($uri[1]) {
    case 'shout':
        
        $author = null;
        if (isset($uri[2])) {
            $author = $uri[2];
        }

        echo 'route ok';


        break;
    
    default:
        header("HTTP/1.1 404 Not Found");
        exit();
        break;
}





?>
