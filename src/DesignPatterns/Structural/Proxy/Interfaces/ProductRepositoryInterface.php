<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Proxy\Interfaces;

interface ProductRepositoryInterface
{
    public function find(int $productId): string;
}
