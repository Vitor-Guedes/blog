<?php
namespace Modules\Blog\View\Components\Grid;
use Illuminate\View\Component;
class Button extends Component
{
    protected $id;

    protected $label;

    protected $action;

    protected $row;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $label, $action, $row)
    {
        $this->id = $id;
        $this->label = $label;
        $this->action = $action;
        $this->row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.grid/button');
    }

    public function getId()
    {
        return $this->id . "-" . $this->row['id'];
    }
    
    public function getLabel()
    {
        return $this->label;
    }

    public function getAction()
    {
        return route($this->action, $this->row['id']);
    }
}
