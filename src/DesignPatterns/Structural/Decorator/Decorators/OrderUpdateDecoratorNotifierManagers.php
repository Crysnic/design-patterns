<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Decorator\Decorators;

class OrderUpdateDecoratorNotifierManagers extends OrderUpdateDecoratorAbstract
{
    protected function actionAfter()
    {
        $this->logger->info('Notify managers');
        usleep(1100);
    }
}
