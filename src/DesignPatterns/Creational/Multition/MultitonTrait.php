<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\Multition;

trait MultitonTrait
{
    /**
     * @var MultitonInterface[]
     */
    protected static array $instances = [];

    /**
     * свойство для проверки в конструкторе, чтобы запретить new SimpleMultiton()
     */
    private static bool $isConstructorEnabled = false;

    /**
     * @var string
     */
    private string $name;

    public function __construct(string $name)
    {
        if (!static::$isConstructorEnabled) {
            throw new \Exception('Multiton can be received only from getInstance');
        }
        $this->name = $name;
    }

    public function __clone()
    {
        throw new \Exception('__clone is forbidden for Multiton');
    }

    public function __wakeup()
    {
        throw new \Exception('__wakeup is forbidden for Multiton');
    }

    public static function getInstance(string $name): MultitonInterface
    {
        if (isset(static::$instances[$name])) {
            return static::$instances[$name];
        }

        static::$isConstructorEnabled = true;
        static::$instances[$name] = new static($name);
        static::$isConstructorEnabled = false;

        return static::$instances[$name];
    }

    public function __toString()
    {
        $result = new \stdClass();
        foreach ($this as $key => $value) {
            $result->$key = $value;
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }


}
