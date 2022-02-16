<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge;

use App\DesignPatterns\Structural\Bridge\Abstraction\WidgetBigAbstraction;
use App\DesignPatterns\Structural\Bridge\Abstraction\WidgetMiddleAbstraction;
use App\DesignPatterns\Structural\Bridge\Abstraction\WidgetSmallAbstraction;
use App\DesignPatterns\Structural\Bridge\Entities\Category;
use App\DesignPatterns\Structural\Bridge\Entities\Product;
use App\DesignPatterns\Structural\Bridge\Realisation\CategoryWidgetRealization;
use App\DesignPatterns\Structural\Bridge\Realisation\ProductWidgetRealization;
use Psr\Log\LoggerInterface;

class BridgeDemo
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function run()
    {
        $productRealization = new ProductWidgetRealization(new Product(1, 'Картошка', '1 кг. картошки'));
        $categoryRealization = new CategoryWidgetRealization(
            new Category(4, 'Овощи', 'Быстро портящиеся продукты')
        );

        $views = [
            new WidgetBigAbstraction($this->logger),
            new WidgetMiddleAbstraction($this->logger),
            new WidgetSmallAbstraction($this->logger)
        ];

        foreach ($views as $view) {
            $view->run($productRealization);
            $view->run($categoryRealization);
            usleep(1100);
        }
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'структурный шаблон проектирования, который разделяет один или несколько классов на две'
            . 'отдельные иерархии — абстракцию и реализацию, позволяя изменять их независимо друг от друга.'
        ];
    }

    /**
     * @return string
     */
    public static function getLink(): string
    {
        return 'https://refactoring.guru/ru/design-patterns/bridge';
    }
}
