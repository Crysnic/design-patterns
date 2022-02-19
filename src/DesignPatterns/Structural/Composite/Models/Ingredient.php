<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Composite\Models;

use App\DesignPatterns\Structural\Composite\Interfaces\CompositeItemInterface;
use Psr\Log\LoggerInterface;

class Ingredient implements CompositeItemInterface
{
    private int $id;

    private string $name;

    private string $type;

    private LoggerInterface $logger;

    /**
     * @param string $name
     * @param LoggerInterface $logger
     * @throws \Exception
     */
    public function __construct(string $name, LoggerInterface $logger)
    {
        $this->id = random_int(1, 99);
        $this->name = $name;
        $this->type = 'ingredient';
        $this->logger = $logger;
    }

    public function calculatePrice(): float
    {
        $prices = [10, 20, 30, 40, 50];
        $price = $prices[array_rand($prices)];
        $this->logger->info("[{$this->id}] {$this->type}::{$this->name} = {$price}");
        usleep(1100);
        return $price;
    }
}
