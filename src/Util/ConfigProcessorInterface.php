<?php

declare(strict_types=1);

namespace App\Util;

use App\Util\Exception\LoadConfigException;

interface ConfigProcessorInterface
{
    /**
     * @throws LoadConfigException
     */
    public function loadJson(string $configPath): ConfigProcessorInterface;

    /**
     * @throws LoadConfigException
     */
    public function getByKey(string $key, bool $onlyEnabled = true): array;
}
