<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use App\Helpers\FileHelper;

final class FileHelperTest extends TestCase
{

    /** @test */
    public function filenameShouldBeSystemFriendly(): void
    {
        $this->assertEquals(
            'real_shout_here_not_a_friendly_nme',
            FileHelper::sanitizeFileName('real shout here, not a friendly n@me!')
        );
    }

}
