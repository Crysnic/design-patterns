<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Realisation;

interface WidgetRealizationInterface
{
    public function getId(): int;

    public function getTitle(): string;

    public function getDescription(): string;
}
