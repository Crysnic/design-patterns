<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\Prototype;

class Client
{
    private int $id;

    private string $name;

    private array $orders;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->orders = [];
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
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    public function addOrder(Order $order): void
    {
        $order->setClient($this);
        $this->orders[] = $order;
    }

    public function __toString()
    {
        $result = new \stdClass();
        foreach ($this as $key => $value) {
            $result->$key = $value;
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
