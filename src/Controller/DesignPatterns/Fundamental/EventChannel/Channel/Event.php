<?php

declare(strict_types=1);

namespace App\Controller\DesignPatterns\Fundamental\EventChannel\Channel;

/**
 * Через данный класс отправляются данные по каналу событий
 */
class Event
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $message;

    /**
     * @param string $title
     * @param string $message
     */
    public function __construct(string $title, string $message)
    {
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    public function __toString()
    {
        $result = [];
        foreach ($this as $key => $value) {
            $result[$key] = $value;
        }
        return (string) json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
