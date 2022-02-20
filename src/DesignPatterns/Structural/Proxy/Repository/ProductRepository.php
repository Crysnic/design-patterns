<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Proxy\Repository;

use App\DesignPatterns\Structural\Proxy\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function find(int $productId): string
    {
        return 'Product_'.$productId.' from ProductRepository';
    }
}
