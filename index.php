<?php

use CodeBreaker\Entities\Cipher;

require 'vendor/autoload.php';

class CodeBreaker
{
    const VERSION = '0.1.0';

    const SLUG = 'code-breaker';

    public static string $path = '';

    private static $_instance;

    /**
     * @return CodeBreaker
     *
     * Set off the Singleton pattern for the main plugin class
     */
    public static function instance(): CodeBreaker
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        self::$_instance = $this;

        $this->setPath();
    }

    private function setPath(): void
    {
        if (!self::$path) {
            self::$path = rtrim((dirname(__FILE__)));
        }
    }
}

CodeBreaker::instance();

$cipherController = new \CodeBreaker\Controllers\CipherController();
$cipherController->loadCipher();