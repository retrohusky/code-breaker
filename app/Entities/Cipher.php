<?php

namespace CodeBreaker\Entities;

use CodeBreaker\App;

class Cipher
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

    public function decipherCharacter($element)
    {
        return $this->cipher[$element] ?? $element;
    }

    public function codeCharacter($element)
    {
        return $this->cipherForCoding[$element] ?? $element;
    }
}
