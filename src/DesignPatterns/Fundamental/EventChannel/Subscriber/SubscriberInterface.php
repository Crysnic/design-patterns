<?php

declare(strict_types=1);

namespace App\DesignPatterns\Fundamental\EventChannel\Subscriber;

use App\DesignPatterns\Fundamental\EventChannel\Channel\Event;

interface SubscriberInterface
{
    public function notify(Event $event): void;

    public function getName(): string;
}
