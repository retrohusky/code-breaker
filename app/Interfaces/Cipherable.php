<?php

namespace CodeBreaker\Interfaces;

interface Cipherable
{
    public function codeCharacter(string $character);

    public function decodeCharacter(string $character);
}