<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Decorator\Traits;

use Psr\Log\LoggerInterface;

trait LoggerTrait
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
