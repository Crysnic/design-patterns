<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental\Delegation;

interface MessengerInterface
{
    /**
     * @param string $sender
     * @return MessengerInterface
     */
    public function setSender(string $sender): MessengerInterface;

    /**
     * @param string $recipient
     * @return MessengerInterface
     */
    public function setRecipient(string $recipient): MessengerInterface;

    /**
     * @param string $message
     * @return MessengerInterface
     */
    public function setMessage(string $message): MessengerInterface;

    /**
     * @return bool
     */
    public function send(): bool;
}
