<?php

namespace Modules\Blog\Services;

class ArticleService
{
    public function getArticles()
    {
        return [
            [
                'id' => 1,
                'title' => 'Art 1',
                'active' => true
            ],
            [
                'id' => 2,
                'title' => 'Art 2',
                'active' => true
            ]
        ];
    }
}