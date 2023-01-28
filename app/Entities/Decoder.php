<?php

namespace CodeBreaker\Entities;

class Decoder
{
    public function decode($message, Cipher $cipher): string
    {
        $messageArray = mb_str_split($message);

        $decodedMessage = array_map(function ($element) use ($cipher) {
            return $cipher->decipherCharacter($element);
        }, $messageArray);

        return implode($decodedMessage);
    }
}
