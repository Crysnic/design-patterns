<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\StaticFactory;

use App\DesignPatterns\Creational\StaticFactory\Registry\AlfaBankRegistry;
use App\DesignPatterns\Creational\StaticFactory\Registry\MonoBankRegistry;

class RegistryFactory
{
    public static function build(int $registryId): RegistryInterface
    {
        switch ($registryId) {
            case 1:
                return new MonoBankRegistry();
            case 2:
                return new AlfaBankRegistry();
            default:
                throw new \Exception('Unknown registry Id');
        }
    }
}
