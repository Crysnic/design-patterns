<?php

declare(strict_types=1);

namespace App\DesignPatterns\Bahavioral\Strategy\CommissionStrategies;

use App\DesignPatterns\Bahavioral\Strategy\Entity\PaymentInfo;

interface CalculateCommissionStrategyInterface
{
    /**
     * @param PaymentInfo $paymentInfo
     * @return int
     */
    public function calculate(PaymentInfo $paymentInfo): int;

    /**
     * @return string
     */
    public function getName(): string;
}
