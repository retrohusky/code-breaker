<?php

namespace CodeBreaker\Entities;

class Cipher
{
    private array $cipher = [];

    public function __construct($cipherFile = 'default')
    {
        $this->getCipherFromFile( $cipherFile );
    }

    private function getCipherFromFile( $cipherFile ): void
    {
        $filename = \CodeBreaker::$path . '/ciphers/' . $cipherFile . '.json';

        if ( !file_exists( $filename ) ) {
            return;
        }

        $this->cipher = json_decode(file_get_contents($filename), true);
    }
}