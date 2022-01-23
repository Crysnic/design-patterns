<?php

declare(strict_types=1);

namespace App\Middleware\Creational\Builder;

use App\Middleware\Creational\Builder\Classes\BlogPost;
use App\Middleware\Creational\Builder\Interfaces\BlogPostBuilderInterface;

class BlogPostBuilder implements BlogPostBuilderInterface
{
    private BlogPost $blogPost;

    public function __construct()
    {
        $this->create();
    }

    /**
     * Сохраняем пустой обьект в свойство blogPost
     *
     * @return BlogPostBuilderInterface
     */
    public function create(): BlogPostBuilderInterface
    {
        $this->blogPost = new BlogPost();

        return $this;
    }

    /**
     * @param string $title
     * @return BlogPostBuilderInterface
     */
    public function setTitle(string $title): BlogPostBuilderInterface
    {
        $this->blogPost->title = $title;

        return $this;
    }

    /**
     * @param string $body
     * @return BlogPostBuilderInterface
     */
    public function setBody(string $body): BlogPostBuilderInterface
    {
        $this->blogPost->body = $body;

        return $this;
    }

    /**
     * @param array $categories
     * @return BlogPostBuilderInterface
     */
    public function setCategories(array $categories): BlogPostBuilderInterface
    {
        $this->blogPost->categories = $categories;

        return $this;
    }

    /**
     * @param array $tags
     * @return BlogPostBuilderInterface
     */
    public function setTags(array $tags): BlogPostBuilderInterface
    {
        $this->blogPost->tags = $tags;

        return $this;
    }

    /**
     * Возвращаем построенный обьект и сохраняем новый пустой обьект в свойство blogPost
     *
     * @return BlogPost
     */
    public function getBlogPost(): BlogPost
    {
        $result = $this->blogPost;
        $this->create();

        return $result;
    }
}
