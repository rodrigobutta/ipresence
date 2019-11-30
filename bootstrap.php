<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Klein\Klein;

// handle config and env file
$dotenv = Dotenv::create(__DIR__);
$dotenv->load();
$datasources = require_once __DIR__.'/datasources.php';

// routing 
$routing = new Klein();