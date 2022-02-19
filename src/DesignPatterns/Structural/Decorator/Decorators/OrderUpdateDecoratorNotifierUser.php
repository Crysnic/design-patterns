<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Decorator\Decorators;

class OrderUpdateDecoratorNotifierUser extends OrderUpdateDecoratorAbstract
{
    protected function actionAfter()
    {
        $this->logger->info('Notify user');
        usleep(1100);
    }
}
