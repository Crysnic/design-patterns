<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Proxy\Repository;

use App\DesignPatterns\Structural\Proxy\Interfaces\ProductRepositoryInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class ProductRepositoryProxy implements ProductRepositoryInterface
{
    private ProductRepositoryInterface $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function find(int $productId): string
    {
        $key = 'getProduct_'.$productId;

        return (new FilesystemAdapter())->get($key, function (ItemInterface $item) use ($productId) {
            $item->expiresAfter(60);

            return 'PROXY::'.$this->productRepository->find($productId);
        });
    }
}
