<?php

declare(strict_types=1);

namespace App\Entity;

/**
 * DTO для передечи примера кода шаблона проектирвоания
 */
class DesignPatternExample
{
    private string $code;

    private string $description;

    /**
     * @param string $code
     * @param string $description
     */
    public function __construct(string $code, string $description)
    {
        $this->code = $code;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
