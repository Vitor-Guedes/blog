<?php

namespace Modules\Blog\View\Components\Form\Input;

class Text extends AbstractInput
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blog::components.form/input/text');
    }
}
