<?php

declare(strict_types=1);

namespace App\Middleware\Creational\Builder;

use App\Middleware\Creational\Builder\Classes\BlogPost;
use App\Middleware\Creational\Builder\Interfaces\BlogPostBuilderInterface;

class BlogPostDirector
{
    private BlogPostBuilderInterface $builder;

    /**
     * @param BlogPostBuilderInterface $builder
     */
    public function __construct(BlogPostBuilderInterface $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    public function createCleanPost(): BlogPost
    {
        return $this->builder->getBlogPost();
    }

    public function createNewPostIt(): BlogPost
    {
        return $this->builder
            ->setTitle('Title It')
            ->setBody('Body It')
            ->setCategories(['IT'])
            ->setTags(['tag_it', 'tag_programming'])
            ->getBlogPost();
    }

    public function createNewPostBuildingHouse(): BlogPost
    {
        return $this->builder
            ->setTitle('Title building')
            ->setBody('Body building')
            ->setCategories(['Строительство', 'Ремонт'])
            ->setTags(['tag_repair', 'tag_building'])
            ->getBlogPost();
    }
}
