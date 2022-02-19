<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Composite\Models;

use App\DesignPatterns\Structural\Composite\Interfaces\CompositeInterface;
use App\DesignPatterns\Structural\Composite\Traits\CompositeTrait;
use Psr\Log\LoggerInterface;

class Product implements CompositeInterface
{
    use CompositeTrait;

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
        $this->id = random_int(100, 199);
        $this->name = $name;
        $this->type = 'product';
        $this->logger = $logger;
    }

    public function calculatePrice(): float
    {
        $price = 0.00;
        foreach ($this->compositePriceItems as $compositePriceItem) {
            $price += $compositePriceItem->calculatePrice();
        }

        $this->logger->info("[{$this->id}] {$this->type}::{$this->name} = {$price}");
        usleep(1100);
        return $price;
    }
}
