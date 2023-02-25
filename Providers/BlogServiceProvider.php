<?php

namespace Modules\Blog\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Blog\View\Components\Button;
use Modules\Blog\View\Components\Form;
use Modules\Blog\View\Components\Form\Input;
use Modules\Blog\View\Components\Grid;
use Modules\Blog\View\Components\Grid\Row;
use Modules\Blog\View\Components\Grid\Column;
use Modules\Blog\View\Components\Grid\Button as GridButton;

class BlogServiceProvider
extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Blog';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'blog';

    public function boot()
    {
        $this->registerViews();

        $this->registerViewComponents();
    }

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }

    public function registerViewComponents()
    {
        Blade::component('grid-table-column', Column::class);
        Blade::component('grid-table-row', Row::class);
        Blade::component('grid-button', GridButton::class);
        Blade::component('button', Button::class);
        Blade::component('blog-grid', Grid::class);

        Blade::component('form', Form::class);
        Blade::component('form-input', Input::class);
    }
}