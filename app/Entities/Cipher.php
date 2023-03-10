<?php

namespace CodeBreaker\Entities;

use CodeBreaker\App;
use CodeBreaker\Interfaces\Cipherable;

class Cipher implements Cipherable
{
    private array $cipher          = [];
    private array $cipherForCoding = [];

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

        $cipher = json_decode(file_get_contents($filename), true);

        $this->cipherForCoding = $cipher;
        $this->cipher          = array_flip($cipher);
    }

    public function hasFileLoaded(): bool
    {
        return !empty($this->cipher) && !empty($this->cipherForCoding);
    }

    public function decodeCharacter(string $character)
    {
        return $this->cipher[$character] ?? $character;
    }

    public function codeCharacter(string $character)
    {
        return $this->cipherForCoding[$character] ?? $character;
    }
}
