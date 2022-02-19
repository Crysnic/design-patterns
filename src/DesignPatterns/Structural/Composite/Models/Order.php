<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Composite\Models;

use App\DesignPatterns\Structural\Composite\Interfaces\CompositeInterface;
use App\DesignPatterns\Structural\Composite\Traits\CompositeTrait;
use Psr\Log\LoggerInterface;

class Order implements CompositeInterface
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
        $this->id = random_int(200, 299);
        $this->name = $name;
        $this->type = 'order';
        $this->logger = $logger;
    }

    public function calculatePrice(): float
    {
        $price = 0.00;
        foreach ($this->compositePriceItems as $compositePriceItem) {
            $price += $compositePriceItem->calculatePrice();
        }

        $this->logger->debug("[{$this->id}] {$this->type}::{$this->name} = {$price}");
        usleep(1100);
        return $price;
    }
}
