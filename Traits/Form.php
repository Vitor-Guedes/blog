<?php

namespace Modules\Blog\Traits;

trait Form
{
    protected $inputs = [];

    public function addInput(string $id, array $settings)
    {
        $this->inputs[$id] = (object) $settings;
    }

    public function getInputs()
    {
        return collect($this->inputs);
    }
}