<?php
namespace App\Repositories;

interface ShoutRepository
{

    public function getByAuthor($author,$limit);

}