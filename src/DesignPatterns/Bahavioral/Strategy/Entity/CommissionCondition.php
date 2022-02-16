<?php

declare(strict_types=1);

namespace App\DesignPatterns\Bahavioral\Strategy\Entity;

class CommissionCondition
{
    private int $fromAmt;

    private int $toAmt;

    private int $commissionAmt;

    /**
     * @param int $fromAmt
     * @param int $toAmt
     * @param int $commissionAmt
     */
    public function __construct(int $fromAmt, int $toAmt, int $commissionAmt)
    {
        $this->fromAmt = $fromAmt;
        $this->toAmt = $toAmt;
        $this->commissionAmt = $commissionAmt;
    }

    /**
     * @return int
     */
    public function getFromAmt(): int
    {
        return $this->fromAmt;
    }

    /**
     * @return int
     */
    public function getToAmt(): int
    {
        return $this->toAmt;
    }

    /**
     * @return int
     */
    public function getCommissionAmt(): int
    {
        return $this->commissionAmt;
    }
}
