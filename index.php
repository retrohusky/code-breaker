<?php

namespace CodeBreaker;

class CodeBreaker
{
    protected const VERSION = '0.1.0';

    protected const SLUG = 'code-breaker';

    public static string $path = '';

    private static $instance;

    /**
     * @return CodeBreaker
     *
     * Set off the Singleton pattern for the main plugin class
     */
    public static function instance(): CodeBreaker
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        self::$instance = $this;

        $this->setPath();
    }

    private function setPath(): void
    {
        if (!self::$path) {
            self::$path = rtrim((dirname(__FILE__)));
        }
    }
}

require 'vendor/autoload.php';

CodeBreaker::instance();

$cipherController = new \CodeBreaker\Controllers\CipherController();
$cipherController->loadCipher();
