<?php
namespace App\Cache;

interface CacheInterface
{

    public function exists();
    public function get();
    public function put($data);

}