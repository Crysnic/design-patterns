<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Facade\Classes;

class Order
{
    private int $id;

    private string $name;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return static
     */
    public static function buildEmpty(): self
    {
        return new self(0, '');
    }
}
