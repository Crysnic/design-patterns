<?php

declare(strict_types=1);

namespace App\Middleware\Creational\Singleton;

class SimpleSingleton
{
    use SingletonTrait;

    private string $test;

    /**
     * @param string $test
     */
    public function setTest(string $test): void
    {
        $this->test = $test;
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'шаблон проектирования, который гарантирует, что у класса есть только один экземпляр,
            и предоставляет к нему глобальную точку доступа.'
        ];
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
