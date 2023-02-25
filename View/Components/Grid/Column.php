<?php

namespace Modules\Blog\View\Components\Grid;

use Illuminate\View\Component;

class Column extends Component
{
    protected $column;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($column)
    {
        $this->column = $column;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.grid/column');
    }

    public function getColumnLabel()
    {
        return $this->column->label;
    }
}
