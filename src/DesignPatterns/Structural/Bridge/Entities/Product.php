<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Entities;

class Product
{
    public int $id;

    public string $name;

    public string $description;

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     */
    public function __construct(int $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
}
