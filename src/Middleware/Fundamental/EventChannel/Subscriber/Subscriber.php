<?php

declare(strict_types=1);

namespace App\Middleware\Fundamental\EventChannel\Subscriber;

use App\Middleware\Fundamental\EventChannel\Channel\Event;
use Psr\Log\LoggerInterface;

class Subscriber implements SubscriberInterface
{
    private string $name;

    private LoggerInterface $logger;

    /**
     * @param string $name
     * @param LoggerInterface $logger
     */
    public function __construct(string $name, LoggerInterface $logger)
    {
        $this->name = $name;
        $this->logger = $logger;
    }

    public function notify(Event $event): void
    {
        $this->logger->info($this->getName().' получил(а) сообщение: '.$event);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
