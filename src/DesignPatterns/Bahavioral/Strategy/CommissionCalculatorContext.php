<?php

declare(strict_types=1);

namespace App\DesignPatterns\Bahavioral\Strategy;

use App\DesignPatterns\Bahavioral\Strategy\CommissionStrategies\CalculateCommissionStrategyInterface;
use App\DesignPatterns\Bahavioral\Strategy\Entity\CommissionCondition;
use App\DesignPatterns\Bahavioral\Strategy\Entity\PaymentInfo;
use Exception;
use Psr\Log\LoggerInterface;

class CommissionCalculatorContext
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param int $serviceId
     * @param int $paymentAmount
     * @param string $fundsType
     * @return int
     * @throws Exception
     */
    public function calculate(int $serviceId, int $paymentAmount, string $fundsType): int
    {
        $this->logger->info(sprintf(
            "Подсчет комиссии платежа на сумму %.2f грн. сервиса %d со способом оплаты %s",
            (float) $paymentAmount/100,
            $serviceId,
            $fundsType
        ));
        usleep(1100);

        $strategy = $this->selectStrategy($fundsType);
        $this->logger->info("Подсчет производит стратерия <".$strategy->getName().">");
        usleep(1100);

        $commission = $strategy->calculate(new PaymentInfo(
            $this->findConditions($serviceId),
            $paymentAmount
        ));
        $this->logger->info(sprintf("Комиссия: %.2f", (float) $commission/100));
        return $commission;
    }

    /**
     * @param string $fundsType
     * @return CalculateCommissionStrategyInterface
     * @throws Exception
     */
    private function selectStrategy(string $fundsType): CalculateCommissionStrategyInterface
    {
        $namespace = __NAMESPACE__.'\CommissionStrategies\\'.ucfirst($fundsType).'CalculateStrategy';

        if (!class_exists($namespace)) {
            throw new Exception('Not exists strategy for fundsType <'.$fundsType.'>');
        }
        return new $namespace;
    }

    /**
     * @param int $serviceId
     * @return CommissionCondition[]
     */
    private function findConditions(int $serviceId): array
    {
        return [
            new CommissionCondition(0, 20000, rand(1, 300)),
            new CommissionCondition(20000, 10000, rand(500, 1500)),
            new CommissionCondition(10000, 0, $serviceId * 100)
        ];
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'шаблон проектирования, который определяет семейство схожих алгоритмов и помещает каждый из них в
            собственный класс, после чего алгоритмы можно взаимозаменять прямо во время исполнения программы.'
        ];
    }
}
