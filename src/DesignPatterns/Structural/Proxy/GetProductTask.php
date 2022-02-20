<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Proxy;

use App\DesignPatterns\Structural\Proxy\Interfaces\ProductRepositoryInterface;

class GetProductTask
{
    private ProductRepositoryInterface  $productRepository;

    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function run(int $productId): string
    {
        return $this->productRepository->find($productId);
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'структурный шаблон проектирования, предоставляющий объект, который контролирует
            доступ к другому объекту, перехватывая все вызовы (выполняет функцию контейнера).',
            'Заместитель позволяет создать промежуточный слой между бизнес-логикой приложения и деталями.',
            "Пример:",
            "В существующий класс реализованный как деталь (плагин) для основной бизнес-логики требуется добавить некую дополнительную функциональность:",
            '*  1) Кеширование',
            '*  2) Проверка доступа перед исполнением',
            '*  3) Шифрование запроса перед отправкой (расшифровка ответа)',
            '*  4) Логирование',
            '*  5) Анализ кол-ва обращений и тп'
        ];
    }

    /**
     * @return string
     */
    public static function getLink(): string
    {
        return 'https://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%BC%D0%B5%D1%81%D1%82%D0%B8%D1%82%D0%B5%D0%BB%D1%8C_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)';
    }
}
