<?php

namespace Modules\Blog\View\Components;

use Illuminate\View\Component;
use Modules\Blog\Services\ArticleService;
use Modules\Blog\Traits\Grid\Columns;
use Modules\Blog\View\Components\Grid\Button;

class Grid extends Component
{
    use Columns;

    protected $articleService;

    protected $collection = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;

        $this->prepareColumns();

        $this->prepareCollection();
    }

    protected function prepareColumns()
    {
        $this->addColumns('id', [
            'index' => 'id',
            'label' => __('blog::app.grid.id'),
            'type' => 'int'
        ]);

        $this->addColumns('title', [
            'index' => 'title',
            'label' => __('blog::app.grid.title'),
            'type' => 'string'
        ]);

        $this->addColumns('active', [
            'index' => 'active',
            'label' => __('blog::app.grid.active'),
            'type' => 'boolean'
        ]);

        $this->addColumns('actions', [
            'label' => __('blog::app.grid.actions'),
            'type' => 'component',
            'component' => [
                'type' => Button::class,
                'params' => [
                    'id' => 'edit',
                    'label' => __('blog::app.btn.action.edit'),
                    'action' => 'blog.admin.article.edit'
                ]
            ]
        ]);
    }

    protected function prepareCollection()
    {
        $this->collection = $this->articleService->getArticles();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.articles.grid');
    }

    public function getCollection()
    {
        if (is_array($this->collection)) {
            return collect($this->collection);
        }
        return $this->collection;
    }

    public function hasCollection()
    {
        return $this->getCollection()->isEmpty();
    }

    public function emptyMessage($content = '1')
    {
        return __('blog::app.grid.collection.empty');
    }

    public function getColumnsCount()
    {
        return $this->getColumns()->count();
    }
}
