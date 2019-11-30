<?php
namespace App\Utils;

use App\Helpers\FileHelper;


class FileCache {

    protected $cacheFile;
  
    public function __construct()
    {
        $this->cacheFile = $this->getCacheFilePath(func_get_args());
    }

    public function exists()
    {
        return file_exists($this->cacheFile) && file_get_contents($this->cacheFile) !== '';
    }

    public function get()
    {
        $json_results = file_get_contents($this->cacheFile);
        return json_decode($json_results);
        // return [json_decode($json_results),"cached"=>true];
    }

    public function put($data)
    {
        file_put_contents($this->cacheFile, json_encode($data));
        return $data;
        // return [$data,"cached"=>false];
    }

    private function getCacheFilePath($args)
    {

        $path = $_SERVER['DOCUMENT_ROOT'] . '/cache/';

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