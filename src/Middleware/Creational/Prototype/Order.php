<?php

declare(strict_types=1);

namespace App\Middleware\Creational\Prototype;

use DateTime;

class Order
{
    private int $id;

    private string $name;

    private DateTime $deliveredAt;

    private Client $client;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name, DateTime $deliveredAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->deliveredAt = $deliveredAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return DateTime
     */
    public function getDeliveredAt(): DateTime
    {
        return $this->deliveredAt;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function __toString()
    {
        $result = new \stdClass();
        foreach ($this as $key => $value) {
            if ($key === 'deliveredAt') {
                /** @var DateTime $value */
                $result->$key = $value->format('m.d.Y H:i:s');
            } else {
                $result->$key = $value;
            }
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function __clone()
    {
        $this->id = 0;
        $this->name .= '_copy';
        $this->deliveredAt = clone $this->deliveredAt;

        $this->client->addOrder($this);
    }
}
