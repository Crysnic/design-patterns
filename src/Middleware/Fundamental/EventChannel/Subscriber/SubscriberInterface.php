<?php

declare(strict_types=1);

namespace App\Middleware\Fundamental\EventChannel\Subscriber;

use App\Middleware\Fundamental\EventChannel\Channel\Event;

interface SubscriberInterface
{
    public function notify(Event $event): void;

    public function getName(): string;
}
