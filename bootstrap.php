<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

use App\Utils\Database;

// handle the env file
$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

// abstract the database connection, for this test i'll implement MySql only, but it could be other
$db = new Database();
$db = $db->getConnection();