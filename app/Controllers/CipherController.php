<?php

namespace CodeBreaker\Controllers;

use CodeBreaker\Entities\Cipher;
use CodeBreaker\Entities\Decoder;
use CodeBreaker\Interfaces\Cipherable;
use CodeBreaker\Interfaces\Decodable;

class CipherController
{
    private Cipherable $cipher;

    private Decodable $decoder;

    public function __construct()
    {
        $this->decoder = new Decoder();
    }

    public function loadCipher($cipherFile = 'default'): void
    {
        $this->cipher = new Cipher($cipherFile);
    }

    public function decode($message): false|string
    {
        return $this->decoder->decode($message, $this->cipher);
    }

    public function code($message): false|string
    {
        return $this->decoder->code($message, $this->cipher);
    }
}
