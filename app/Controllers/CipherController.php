<?php

namespace CodeBreaker\Controllers;

use CodeBreaker\Entities\Cipher;

class CipherController
{
    private Cipher $cipher;

    public function loadCipher($cipherFile = 'default'): void
    {
        $this->cipher = new Cipher($cipherFile);
    }
}
