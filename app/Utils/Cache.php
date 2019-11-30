<?php
namespace App\Utils;

use App\Helpers\FileHelper;


class Cache {

    public function __construct()
    {

        $cacheFile = $this->getCacheFilePath(func_get_args());

        var_dump($cacheFile);
        exit();


        $this->getCache($cacheFile);
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

    private function getCache($cacheFile)
    {

        // if( !$expires) $expires = time() - 2*60*60;
        // filectime($cacheFile) < $expires
    
        if ( !file_exists($cacheFile) || file_get_contents($cacheFile)  == '') {
    
            $api_results = '[{"quote": "CACYour time is limited, so don’t waste it living someone else’s life!","author": "Steve Jobs"},{"quote": "The only way to do great work is to love what you do.","author": "Steve Jobs"}]';
            $json_results = json_encode($api_results);
    
            if ( $api_results && $json_results )
                file_put_contents($cacheFile, $json_results);
            else
                unlink($cacheFile);

        } else {
           
            $json_results = file_get_contents($cacheFile);
           
        }
    
        return json_decode($json_results);

    }


}