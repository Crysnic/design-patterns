<?php

declare(strict_types=1);

namespace App\Middleware\Creational\Multition;

class SimpleMultitonChild extends SimpleMultiton
{
    /**
     * @var self[]
     */
    protected static array $instances = [];
}
