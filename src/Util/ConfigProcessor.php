<?php

declare(strict_types=1);

namespace App\Util;

use App\Util\Exception\LoadConfigException;

class ConfigProcessor implements ConfigProcessorInterface
{
    private array $settings;

    /**
     * @throws LoadConfigException
     */
    public function loadJson(string $configPath): ConfigProcessorInterface
    {
        try {
            $this->settings = json_decode(file_get_contents($configPath), true);
            return $this;
        } catch (\Throwable $t) {
            throw new LoadConfigException($t->getMessage());
        }
    }

    /**
     * @throws LoadConfigException
     */
    public function getByKey(string $key, bool $onlyEnabled = true): array
    {
        if (!isset($this->settings)) {
            throw new LoadConfigException('Not found loaded configuration');
        } elseif (!isset($this->settings[$key])) {
            throw new LoadConfigException('Key '.$key.' not found');
        }

        if ($onlyEnabled) {
            return $this->filterByEnabled($key);
        }
        return $this->settings[$key];
    }

    /**
     * @return array
     */
    private function filterByEnabled(string $key): array
    {
        $result = [];
        foreach ($this->settings[$key] as $setting) {
            if (isset($setting['enabled']) and $setting['enabled'] === 1) {
                $result[] = $setting;
            }
        }
        return $result;
    }
}
