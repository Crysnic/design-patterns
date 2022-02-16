<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Entities;

class Category
{
    public int $id;

    public string $title;

    public string $description;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     */
    public function __construct(int $id, string $title, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }
}
