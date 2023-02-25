<?php

namespace Modules\Blog\Traits\Form;

use Modules\Blog\View\Components\Form\Input\Text;
use Modules\Blog\View\Components\Form\Input\Checkbox;
use Modules\Blog\View\Components\Form\Input\Submit;
use Modules\Blog\View\Components\Form\Input\TextArea;

trait Input
{
    public function text($input)
    {
        return $this->makeInputComponent(Text::class, $input);
    }

    public function checkbox($input)
    {
        return $this->makeInputComponent(Checkbox::class, $input);
    }

    public function textarea($input)
    {
        return $this->makeInputComponent(TextArea::class, $input);
    }

    public function submit($input)
    {
        return $this->makeInputComponent(Submit::class, $input);
    }

    protected function makeInputComponent($class, $params)
    {
        $component = app()->make($class, ['data' => $params]);
        return $component->render()->with($component->data());
    }
}