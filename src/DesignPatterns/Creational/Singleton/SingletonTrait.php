<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\Singleton;

trait SingletonTrait
{
    private static self $instance;

    /**
     * свойство для проверки в конструкторе, чтобы запретить new SimpleSingleton()
     */
    private static ?string $createFromMethod = null;

    public function __construct()
    {
        if (static::$createFromMethod === null) {
            throw new \Exception('Singleton can be received only from getInstance');
        }
    }

    public function __clone()
    {
        throw new \Exception('__clone is forbidden for Singleton');
    }

    public function __wakeup()
    {
        throw new \Exception('__wakeup is forbidden for Singleton');
    }

    public static function getInstance(): self
    {
        if (!isset(static::$instance)) {
            static::$createFromMethod = 'getInstance';
            static::$instance = new static();
            static::$createFromMethod = null;
        }

        return static::$instance;
    }
}
