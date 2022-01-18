<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental\EventChannel\Publisher;

use App\Controller\DesignPatterns\Fundamental\EventChannel\Channel\Event;

interface PublisherInterface
{
    public function publish(Event $event): void;
}
