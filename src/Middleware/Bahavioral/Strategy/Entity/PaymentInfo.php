<?php

declare(strict_types=1);

namespace App\Middleware\Bahavioral\Strategy\Entity;

class PaymentInfo
{
    /**
     * @var CommissionCondition[]
     */
    private array $conditions;

    private int $payAmount;

    /**
     * @param array $conditions
     * @param int $payAmount
     */
    public function __construct(array $conditions, int $payAmount)
    {
        $this->conditions = $conditions;
        $this->payAmount = $payAmount;
    }

    /**
     * @return CommissionCondition[]
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }

    /**
     * @return int
     */
    public function getPayAmount(): int
    {
        return $this->payAmount;
    }
}
