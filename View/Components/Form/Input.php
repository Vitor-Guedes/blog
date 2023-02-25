<?php
namespace Modules\Blog\View\Components\Form;
use Illuminate\View\Component;
use Modules\Blog\Traits\Form\Input as TraitsInput;

class Input extends Component
{
    use TraitsInput;

    protected $input;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.form/input');
    }

    public function getInputByType()
    {
        $method = $this->input->type;
        if (method_exists($this, $method)) {
            return $this->$method((array) $this->input);
        }
        return "-";
    }
}
