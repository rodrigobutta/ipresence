<?php
require_once __DIR__.'/../bootstrap.php';
require_once __DIR__.'/../routes/command.php';

if (!isset($argc)) {
    echo "ERROR: argc and argv disabled\n";
    exit();
}

dispatch($argv);