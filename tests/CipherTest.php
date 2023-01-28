<?php

namespace CodeBreaker\tests;

use CodeBreaker\App;
use CodeBreaker\Entities\Cipher;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class CipherTest extends TestCase
{
    private Cipher $cipher;
    public function setUp(): void
    {
        parent::setUp();
        App::instance();
        $cipher = new Cipher();
        $cipherReflection = new ReflectionClass(Cipher::class);
        $property = $cipherReflection->getProperty('cipher');
        $property->setAccessible(true);
        $property->setValue($cipher, ['a' => 'z', 'b' => 'y', 'c' => 'x', 'd' => 'd']);
        $this->cipher = $cipher;
    }

    public function testIfCipherFileLoaded()
    {
        $cipherReflection = new ReflectionClass(Cipher::class);
        $property = $cipherReflection->getProperty('cipher');
        $property->setAccessible(true);
        $cipher = $property->getValue($this->cipher);
        $this->assertNotEmpty($cipher);
        $this->assertIsArray($cipher);
    }

    public function testDecipherCharacter()
    {
        $this->assertEquals('z', $this->cipher->decipherCharacter('a'));
        $this->assertEquals('y', $this->cipher->decipherCharacter('b'));
        $this->assertEquals('x', $this->cipher->decipherCharacter('c'));
        $this->assertEquals('d', $this->cipher->decipherCharacter('d'));
    }
}
