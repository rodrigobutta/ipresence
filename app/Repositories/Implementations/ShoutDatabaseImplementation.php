<?php

namespace App\Repositories\Implementations;

use App\Repositories\ShoutRepository;

class ShoutDatabaseImplementation implements ShoutRepository
{

    public function getByAuthor($author, $limit)
    {
        return $author;
    }

}