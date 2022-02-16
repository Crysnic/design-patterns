<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\Builder\Classes;

class BlogPost
{
    public string $title = '';

    public string $body = '';

    /**
     * @var string[]
     */
    public array $categories = [];

    /**
     * @var string[]
     */
    public array $tags = [];

    public function toArray(): array
    {
        $result = [];
        foreach ($this as $key => $value) {
            $result[$key] = $value;
        }
        return $result;
    }
}
