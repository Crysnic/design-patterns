<?php

declare(strict_types=1);

namespace App\Middleware\Fundamental\Delegation\Messengers;

use App\Middleware\Fundamental\Delegation\MessengerInterface;
use Psr\Log\LoggerInterface;

abstract class AbstractMessenger implements MessengerInterface
{
    protected LoggerInterface $logger;

    protected string $sender;

    protected string $recipient;

    protected string $message;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function setSender(string $sender): MessengerInterface
    {
        $this->sender = $sender;

        return $this;
    }

    public function setRecipient(string $recipient): MessengerInterface
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function setMessage(string $message): MessengerInterface
    {
        $this->message = $message;

        return $this;
    }

    public function send(): bool
    {
        return true;
    }

    public function __toString()
    {
        $result = [];
        foreach ($this as $key => $value) {
            $result[$key] = $value;
        }
        return json_encode($result);
    }
}
