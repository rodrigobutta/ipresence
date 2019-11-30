<?php
namespace App\Cache\Implementations;

use App\Helpers\FileHelper;
use App\Cache\CacheInterface;

class FileCache implements CacheInterface{

    protected $cacheFile;
  
    public function __construct()
    {
        $this->cacheFile = $this->getCacheFilePath(func_get_args());
    }

    public function exists()
    {
        // if(getenv('CACHE')!='file') return false;
        return file_exists($this->cacheFile) && file_get_contents($this->cacheFile) !== '';
    }

    public function get()
    {
        $json_results = file_get_contents($this->cacheFile);
        return json_decode($json_results,true);      
    }

    public function put($data)
    {
    
        // if(getenv('CACHE')=='file'){
            file_put_contents($this->cacheFile, json_encode($data));
        // }
        return $data;
    }

    private function getCacheFilePath($args)
    {

        // $path = $_SERVER['DOCUMENT_ROOT'] . '/storage/cache/';
        $path = './cache/'; // using symlink to private  (under storage/cache)

        $filename = '';
        foreach ($args as $index => $arg) {
           $filename .= '_' . ltrim(rtrim($arg));
    
        }
        $filename = ltrim($filename,'_');
        $filename = FileHelper::sanitizeFileName($filename);

        $path = $path . $filename . '.json';

        return $path;
    }



}