<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Composite;

use App\DesignPatterns\Structural\Composite\Models\Ingredient;
use App\DesignPatterns\Structural\Composite\Models\Order;
use App\DesignPatterns\Structural\Composite\Models\Product;
use Psr\Log\LoggerInterface;

class OrderPriceComposite
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function run(): void
    {
        $productA1 = new Product('ProductA1', $this->logger);
        $productA1->addChildItem(new Ingredient('IngredientA1', $this->logger));
        $productA1->addChildItem(new Ingredient('IngredientB1', $this->logger));

        $productA = new Product('ProductA', $this->logger);
        $productA->addChildItem($productA1);
        $productA->addChildItem(new Ingredient('IngredientB', $this->logger));

        $productB = new Product('ProductB', $this->logger);
        $productB->addChildItem(new Ingredient('IngredientA', $this->logger));
        $productB->addChildItem(new Ingredient('IngredientB', $this->logger));
        $productB->addChildItem(new Ingredient('IngredientC', $this->logger));

        $order = new Order('TestOrder', $this->logger);
        $order->addChildItem($productA);
        $order->addChildItem($productB);

        $order->calculatePrice();
    }

    public static function getDescription(): array
    {
        return [
            'структурный шаблон проектирования, который позволяет сгруппировать множество объектов
            в древовидную структуру, а затем работать с ней так, как будто это единичный объект.'
        ];
    }

    public static function getLink(): string
    {
        return 'https://refactoring.guru/ru/design-patterns/composite';
    }
}
