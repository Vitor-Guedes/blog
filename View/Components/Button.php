<?php
namespace Modules\Blog\View\Components;
use Illuminate\View\Component;
class Button extends Component
{
    protected $label;

    protected $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $action)
    {
        $this->label = $label;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.button');
    }

    public function getLabel()
    {
        return __($this->label);
    }

    public function getAction()
    {
        return route($this->action);
    }
}
