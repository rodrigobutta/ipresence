<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use App\Repositories\Implementations\ShoutJsonImplementation;
use App\Cache\Implementations\FileCache;

final class CacheTest extends TestCase
{

    /** @test */
    public function compareCreatedDataAndRetrievedItAfter(): void
    {

        $cache = new FileCache("test","save","retrieve");
        $data = '{"some":"data"}';

        $cache->put($data);
        if($cache->exists()){                    
            $retrievedData = $cache->get();
        }
        else{
            $retrievedData = "couln't create cache";
        }
            
        $this->assertEquals(
            $data,
            $retrievedData
        );
    }

}
