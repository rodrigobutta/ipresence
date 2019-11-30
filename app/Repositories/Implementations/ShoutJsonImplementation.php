<?php

namespace App\Repositories\Implementations;

use App\Repositories\ShoutRepository;

class ShoutJsonImplementation implements ShoutRepository
{

    public function getByAuthor($author, $limit)
    {
        return $author;
    }

}