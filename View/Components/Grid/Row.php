<?php

namespace Modules\Blog\View\Components\Grid;

use Illuminate\View\Component;

class Row extends Component
{
    protected $column;

    protected $row;

    protected $index;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($column, $row)
    {
        $this->column = $column;
        $this->row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.grid/row');
    }

    public function getRowValue()
    {   
        $column = $this->column->index ?? false;

        if (!$column) {
            return $this->buildValue();
        }

        return $this->getValueByType($this->row[$column]);
    }

    protected function getValueByType($value)
    {
        switch ($this->column->type) {
            case 'string':
                return (string) $value;

            case 'boolean':
                return $value 
                    ? __('blog::app.grid.type.boolean.true') 
                        :  __('blog::app.grid.type.boolean.false'); 
            
            default :
                return (string) $value;
        }
    }

    protected function buildValue()
    {
        $compoment = app()->make(
            $this->getComponentInstance(),
            $this->getComponentParams()
        );
        return $compoment->render()
            ->with($compoment->data());
    }

    protected function getComponentInstance()
    {
        $compoment = $this->column->component;
        return $compoment['type'] ?? '';
    }

    public function getComponentParams()
    {
        $compoment = $this->column->component;
        $params = $compoment['params'] ?? [];
        $params['row'] = $this->row ;
        return $params;
    }
}
