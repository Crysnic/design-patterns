<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Composite\Traits;

use App\DesignPatterns\Structural\Composite\Interfaces\CompositeItemInterface;

trait CompositeTrait
{
    /**
     * @var CompositeItemInterface[]
     */
    private array $compositePriceItems = [];

    public function addChildItem(CompositeItemInterface $item): void
    {
        $this->compositePriceItems[] = $item;
    }
}
