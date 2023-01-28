<?php

namespace CodeBreaker\Entities;

use PHPUnit\Framework\TestCase;

class DecoderTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testDecode()
    {
        $cipher = $this->createMock(Cipher::class);

        $cipher->method('decipherCharacter')
            ->willReturnCallback(function ($input) {
                $cipherArray = [
                    'a' => 'z',
                    'b' => 'y',
                    'c' => 'x',
                    'ś' => 's',
                ];
                return $cipherArray[$input] ?? $input;
            });


        $decoder        = new Decoder();
        $decodedMessage = $decoder->decode('abcś', $cipher);
        $this->assertEquals('zyxs', $decodedMessage);
    }
}
