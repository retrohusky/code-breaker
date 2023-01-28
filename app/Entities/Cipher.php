<?php

namespace CodeBreaker\Entities;

use CodeBreaker\App;

class Cipher
{
    private array $cipher = [];

    public function __construct($cipherFile = 'default')
    {
        $this->getCipherFromFile($cipherFile);
    }

    private function getCipherFromFile(string $cipherFile): void
    {
        $filename = App::$path . '/ciphers/' . $cipherFile . '.json';

        if (!file_exists($filename)) {
            return;
        }

        $this->cipher = array_flip(json_decode(file_get_contents($filename), true));
    }

    public function decipherCharacter($element)
    {
        return $this->cipher[$element] ?? $element;
    }
}
