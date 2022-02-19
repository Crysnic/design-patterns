<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Composite\Interfaces;

interface CompositeItemInterface
{
    public function calculatePrice(): float;
}
