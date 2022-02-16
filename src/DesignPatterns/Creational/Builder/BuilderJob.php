<?php

declare(strict_types=1);

namespace App\DesignPatterns\Creational\Builder;

use App\DesignPatterns\Creational\Builder\Classes\BlogPost;
use Psr\Log\LoggerInterface;

class BuilderJob
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function run(): void
    {
        $posts = [];

        $builder = new BlogPostBuilder();
        $posts[] = $builder->setTitle('Тест title')
            ->getBlogPost();

        $director = new BlogPostDirector($builder);
        $posts[] = $director->createCleanPost();
        $posts[] = $director->createNewPostIt();
        $posts[] = $director->createNewPostBuildingHouse();

        $this->logger->info('Built posts: '.$this->postsToString($posts));
    }

    /**
     * @param BlogPost[] $posts
     * @return string
     */
    private function postsToString(array $posts): string
    {
        $result = [];
        foreach ($posts as $post) {
            $result[] = $post->toArray();
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return string[]
     */
    public static function getDescription(): array
    {
        return [
            'шаблон проектирования, который позволяет создавать сложные объекты пошагово.
            Строитель даёт возможность использовать один и тот же код строительства для получения
            разных представлений объектов.'
        ];
    }

    /**
     * @return string
     */
    public static function getUrl(): string
    {
        return 'https://refactoring.guru/ru/design-patterns/builder';
    }
}
