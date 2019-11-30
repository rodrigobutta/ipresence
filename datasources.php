<?php

use App\Repositories\Implementations\ShoutDatabaseImplementation;
use App\Repositories\Implementations\ShoutJsonImplementation;

return [
    'database' => ShoutDatabaseImplementation::class,
    'localjson' => ShoutJsonImplementation::class
];