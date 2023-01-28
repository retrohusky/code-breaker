<?php

namespace CodeBreaker;

class App
{
    protected const VERSION = '0.2.0';

    protected const SLUG = 'code-breaker';

    public static string $path = '';

    private static $instance;

    /**
     * @return App
     *
     * Set off the Singleton pattern for the main plugin class
     */
    public static function instance(): App
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
            self::$path = rtrim((dirname(__FILE__, 2)));
        }
    }
}
