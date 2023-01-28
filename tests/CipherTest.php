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
        $cipherProperty = $cipherReflection->getProperty('cipher');
        $cipherProperty->setAccessible(true);
        $cipherProperty->setValue($cipher, ['a' => 'z', 'b' => 'y', 'c' => 'x', 'd' => 'd']);

        $cipherForCodingProperty = $cipherReflection->getProperty('cipherForCoding');
        $cipherForCodingProperty->setAccessible(true);
        $cipherForCodingProperty->setValue($cipher, ['a' => 'Ś', 'b' => 'Ć', 'c' => 'Ł']);

        $this->cipher = $cipher;
    }

    public function testIfCipherFileLoaded()
    {
        $this->assertTrue($this->cipher->hasFileLoaded());
    }

    public function testDecipherCharacter()
    {
        $this->assertEquals('z', $this->cipher->decipherCharacter('a'));
        $this->assertEquals('y', $this->cipher->decipherCharacter('b'));
        $this->assertEquals('x', $this->cipher->decipherCharacter('c'));
        $this->assertEquals('d', $this->cipher->decipherCharacter('d'));
    }

    public function testCodeCharacter()
    {
        $this->assertEquals('Ś', $this->cipher->codeCharacter('a'));
        $this->assertEquals('Ć', $this->cipher->codeCharacter('b'));
        $this->assertEquals('Ł', $this->cipher->codeCharacter('c'));
        $this->assertEquals('d', $this->cipher->codeCharacter('d'));
    }
}
