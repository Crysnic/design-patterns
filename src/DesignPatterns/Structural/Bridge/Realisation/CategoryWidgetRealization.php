<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Realisation;

use App\DesignPatterns\Structural\Bridge\Entities\Category;

class CategoryWidgetRealization implements WidgetRealizationInterface
{
    private Category $entity;

    /**
     * @param Category $entity
     */
    public function __construct(Category $entity)
    {
        $this->entity = $entity;
    }

    public function getId(): int
    {
        return $this->entity->id;
    }

    public function getTitle(): string
    {
        return $this->entity->title;
    }

    public function getDescription(): string
    {
        return $this->entity->description;
    }
}
