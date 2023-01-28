<?php

namespace CodeBreaker\Interfaces;

interface Decodable
{
    public function code(string $message, Cipherable $cipherable);

    public function decode(string $message, Cipherable $cipherable);
}