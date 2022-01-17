<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental\Delegation;

use App\Controller\DesignPatterns\Fundamental\Delegation\Messengers\EmailMessanger;
use App\Controller\DesignPatterns\Fundamental\Delegation\Messengers\SmsMessenger;
use Psr\Log\LoggerInterface;

/**
 * Шаблон Делегирование
 * url https://ru.wikipedia.org/wiki/%D0%A8%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%B4%D0%B5%D0%BB%D0%B5%D0%B3%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F
 */
class AppMessenger implements MessengerInterface
{
    private LoggerInterface $logger;

    private MessengerInterface $messanger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;

        $this->toEmail();

        return $this;
    }

    public function toSms()
    {
        $this->messanger = new SmsMessenger($this->logger);

        return $this;
    }

    public function toEmail()
    {
        $this->messanger = new EmailMessanger($this->logger);
    }

    public function setSender(string $sender): MessengerInterface
    {
        $this->messanger->setSender($sender);

        return $this;
    }

    public function setRecipient(string $recipient): MessengerInterface
    {
        $this->messanger->setRecipient($recipient);

        return $this;
    }

    public function setMessage(string $message): MessengerInterface
    {
        $this->messanger->setMessage($message);

        return $this;
    }

    public function send(): bool
    {
        return $this->messanger->send();
    }
}
