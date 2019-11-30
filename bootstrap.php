<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Klein\Klein;

use App\Utils\Database;


// handle config and env file
$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

$config = require_once __DIR__.'/config.php';


// routing 

$routing = new Klein();


// TODO 
// abstract the database connection, for this test i'll implement MySql only, but it could be other
$db = new Database();
$db = $db->getConnection();


