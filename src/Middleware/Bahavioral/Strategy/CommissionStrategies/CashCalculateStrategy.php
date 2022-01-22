<?php

declare(strict_types=1);

namespace App\Middleware\Bahavioral\Strategy\CommissionStrategies;

use App\Middleware\Bahavioral\Strategy\Entity\PaymentInfo;

class CashCalculateStrategy implements CalculateCommissionStrategyInterface
{
    public function calculate(PaymentInfo $paymentInfo): int
    {
        foreach ($paymentInfo->getConditions() as $condition) {
            if ($condition->getFromAmt() <= $paymentInfo->getPayAmount() and
                ($paymentInfo->getPayAmount() < $condition->getToAmt() or $condition->getToAmt() === 0)) {
                return $condition->getCommissionAmt();
            }
        }

        return 0;
    }

    public function getName(): string
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
