<?php

namespace CodeBreaker\Entities;

use PHPUnit\Framework\TestCase;

class DecoderTest extends TestCase
{
    private Cipher $cipher;
    public function setUp(): void
    {
        parent::setUp();
        $this->cipher = $this->createMock(Cipher::class);

        $this->cipher->method('decipherCharacter')
            ->willReturnCallback(function ($input) {
                $cipherArray = [
                    'a' => 'z',
                    'b' => 'y',
                    'c' => 'x',
                    'ś' => 's',
                ];
                return $cipherArray[$input] ?? $input;
            });

        $this->cipher->method('codeCharacter')
            ->willReturnCallback(function ($input) {
                $cipherArray = [
                    'z' => 'a',
                    'y' => 'b',
                    'x' => 'c',
                    's' => 'ś',
                ];
                return $cipherArray[$input] ?? $input;
            });
    }

    public function testDecode()
    {
        $decoder        = new Decoder();
        $decodedMessage = $decoder->decode('abcś', $this->cipher);
        $this->assertEquals('zyxs', $decodedMessage);
    }

    public function testCode()
    {
        $decoder        = new Decoder();
        $decodedMessage = $decoder->code('zyxs', $this->cipher);
        $this->assertEquals('abcś', $decodedMessage);
    }

    public function testCodeDecode()
    {
        $message = 'zyxs';
        $decoder = new Decoder();
        $codedMessage = $decoder->code($message, $this->cipher);
        $decodedMessage = $decoder->decode($codedMessage, $this->cipher);
        $this->assertEquals($message, $decodedMessage);
    }
}
