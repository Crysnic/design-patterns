<?php

declare(strict_types=1);

namespace App\Middleware\Creational\Builder\Interfaces;

use App\Middleware\Creational\Builder\Classes\BlogPost;

interface BlogPostBuilderInterface
{
    /**
     * @return BlogPostBuilderInterface
     */
    public function create(): BlogPostBuilderInterface;

    /**
     * @param string $title
     * @return BlogPostBuilderInterface
     */
    public function setTitle(string $title): BlogPostBuilderInterface;

    /**
     * @param string $body
     * @return BlogPostBuilderInterface
     */
    public function setBody(string $body): BlogPostBuilderInterface;

    /**
     * @param string[] $categories
     * @return BlogPostBuilderInterface
     */
    public function setCategories(array $categories): BlogPostBuilderInterface;

    /**
     * @param string[] $tags
     * @return BlogPostBuilderInterface
     */
    public function setTags(array $tags): BlogPostBuilderInterface;

    /**
     * @return BlogPost
     */
    public function getBlogPost(): BlogPost;
}
