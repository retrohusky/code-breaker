<?php

namespace CodeBreaker\tests;

use CodeBreaker\App;
use CodeBreaker\Entities\Cipher;
use PHPUnit\Framework\TestCase;

class CipherTest extends TestCase
{
    public function setUp(): void
    {
        App::instance();
    }

    public function testIfCipherFileLoaded()
    {
        $cipher = new Cipher();
        $this->assertNotEmpty($cipher->getCipher());
        $this->assertIsArray($cipher->getCipher());
    }
}
