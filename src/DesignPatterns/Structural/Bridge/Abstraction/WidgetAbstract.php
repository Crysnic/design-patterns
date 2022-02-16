<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Abstraction;

use App\DesignPatterns\Structural\Bridge\Realisation\WidgetRealizationInterface;
use Psr\Log\LoggerInterface;

abstract class WidgetAbstract
{
    protected LoggerInterface $logger;

    protected WidgetRealizationInterface $realization;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return WidgetRealizationInterface
     */
    public function getRealization(): WidgetRealizationInterface
    {
        return $this->realization;
    }

    /**
     * @param WidgetRealizationInterface $realization
     */
    public function setRealization(WidgetRealizationInterface $realization): void
    {
        $this->realization = $realization;
    }

    protected function viewLogic(array $viewData)
    {
        $method = basename(static::class) . '::' . __FUNCTION__;
        $this->logger->info($method.": ".json_encode($viewData, JSON_UNESCAPED_UNICODE));
    }
}
