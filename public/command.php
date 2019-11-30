<?php
require_once __DIR__.'/../bootstrap.php';
require_once __DIR__.'/../routes/command.php';

if (isset($argc)) {
    echo $argv[1] . "\n";
    echo $argv[2] . "\n";
    echo $argv[3] . "\n";
}
else {
    echo "ERROR: argc and argv disabled\n";
    exit();
}

dispatch($argv);