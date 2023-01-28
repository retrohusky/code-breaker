<?php

namespace CodeBreaker\Entities;

use CodeBreaker\Interfaces\Cipherable;
use CodeBreaker\Interfaces\Decodable;

class Decoder implements Decodable
{
    public function decode(string $message, Cipherable $cipher): string
    {
        return $this->processMessage($message, function ($character) use ($cipher) {
            return $cipher->decodeCharacter($character);
        });
    }

    public function code(string $message, Cipherable $cipher): string
    {
        return $this->processMessage($message, function ($character) use ($cipher) {
            return $cipher->codeCharacter($character);
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
