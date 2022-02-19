<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Decorator\Decorators;

class OrderUpdateDecoratorLogger extends OrderUpdateDecoratorAbstract
{
    protected function actionBefore()
    {
        $this->logger->info('Log Before');
        usleep(1100);
    }

    protected function actionAfter()
    {
        $this->logger->info('Log After');
        usleep(1100);
    }

}
