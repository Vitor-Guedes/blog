<?php
namespace Modules\Blog\View\Components;
use Illuminate\View\Component;
use Modules\Blog\Traits\Form as TraitsForm;

class Form extends Component
{
    use TraitsForm;

    protected $method = 'post';

    protected $action = 'blog.admin.article.store';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->prepareForm();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.form');
    }

    public function prepareForm()
    {
        $this->addInput('title', [
            'id' => 'title',
            'label' => __('blog::app.form.title'),
            'required' => true,
            'type' => 'text'
        ]);

        $this->addInput('active', [
            'id' => 'active',
            'label' => __('blog::app.form.active'),
            'required' => true,
            'type' => 'checkbox'
        ]);

        $this->addInput('content', [
            'id' => 'content',
            'label' => __('blog::app.form.content'),
            'required' => true,
            'type' => 'textarea'
        ]);

        $this->addInput('button', [
            'id' => 'buttom',
            'label' => __('blog::app.form.save'),
            'type' => 'submit'
        ]);
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getAction()
    {
        return route($this->action);
    }
}
