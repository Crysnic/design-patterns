<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental\EventChannel\Subscriber;

use App\Controller\DesignPatterns\Fundamental\EventChannel\Channel\Event;

interface SubscriberInterface
{
    public function notify(Event $event): void;

    public function getName(): string;
}
