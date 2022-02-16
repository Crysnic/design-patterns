<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Realisation;

use App\DesignPatterns\Structural\Bridge\Entities\Product;

class ProductWidgetRealization implements WidgetRealizationInterface
{
    private Product $entity;

    /**
     * @param Product $entity
     */
    public function __construct(Product $entity)
    {
        $this->entity = $entity;
    }

    public function getId(): int
    {
        return $this->entity->id;
    }

    public function getTitle(): string
    {
        return $this->entity->name;
    }

    public function getDescription(): string
    {
        return $this->entity->description;
    }
}
