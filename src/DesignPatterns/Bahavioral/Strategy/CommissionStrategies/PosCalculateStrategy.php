<?php

declare(strict_types=1);

namespace App\DesignPatterns\Bahavioral\Strategy\CommissionStrategies;

use App\DesignPatterns\Bahavioral\Strategy\Entity\PaymentInfo;

class PosCalculateStrategy implements CalculateCommissionStrategyInterface
{
    public function calculate(PaymentInfo $paymentInfo): int
    {
        $max = 0;
        foreach ($paymentInfo->getConditions() as $condition) {
            if ($condition->getCommissionAmt() > $max) {
                $max = $condition->getCommissionAmt();
            }
        }

        if ($max > 0) {
            $max += ((int) (($max / 100 * 0.28) * 100));
        }
        return $max;
    }

    public function getName(): string
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
