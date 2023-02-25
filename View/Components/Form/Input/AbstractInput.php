<?php
namespace Modules\Blog\View\Components\Form\Input;
use Illuminate\View\Component;
class AbstractInput extends Component
{
    protected $data;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return '';
    }

    public function getLabel()
    {
        return $this->data['label'];
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function isRequired()
    {
        return $this->data['required'] ?? false;
    }
}
