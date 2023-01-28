<?php

namespace CodeBreaker\Entities;

class Decoder
{
    public function decode($message, Cipher $cipher): string
    {
        return $this->processMessage($message, function ($element) use ($cipher) {
            return $cipher->decipherCharacter($element);
        });
    }

    public function code($message, Cipher $cipher): string
    {
        return $this->processMessage($message, function ($element) use ($cipher) {
            return $cipher->codeCharacter($element);
        });
    }

    private function processMessage($message, callable $callback): string
    {
        $messageArray = mb_str_split($message);

        if (!$messageArray) {
            return '';
        }

        $processedMessage = array_map($callback, $messageArray);

        return implode($processedMessage);
    }
}
