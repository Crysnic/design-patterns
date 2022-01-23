<?php

declare(strict_types=1);

namespace App\Controller;

use App\Middleware\Bahavioral\Strategy\CommissionCalculatorContext;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BehavioralPatternsController extends AbstractDesignPatternController
{
    protected string $menuId = "behavioral";

    /**
     * Стратегия (англ. strategy)
     *
     * @Route("/behavioral/strategy", name="behavioral.strategy")
     */
    public function strategy(LoggerInterface $logger): Response
    {
        $commissionCalculator = new CommissionCalculatorContext($logger);

        try {
            $commissionCalculator->calculate(1, 1200, 'cash');
            $commissionCalculator->calculate(32, 30000, 'pos');
            $commissionCalculator->calculate(1325, 15000, 'coupon');
        } catch (Exception $e) {
            $logger->debug($e->getMessage());
        }

        return $this->renderDesignPattern(
            'Стратегия (Strategy)',
            'https://refactoring.guru/ru/design-patterns/strategy',
            CommissionCalculatorContext::getDescription(),
            null,
            'Результат работы шаблона в профайлере'
        );
    }
}
