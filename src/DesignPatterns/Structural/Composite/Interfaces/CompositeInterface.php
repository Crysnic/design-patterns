<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Composite\Interfaces;

interface CompositeInterface extends CompositeItemInterface
{
    public function addChildItem(CompositeItemInterface $item): void;
}
