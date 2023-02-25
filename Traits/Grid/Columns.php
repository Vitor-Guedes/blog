<?php

namespace Modules\Blog\Traits\Grid;

trait Columns
{
    protected $columns = [];

    public function addColumns(string $name, array $settings = [])
    {
        $this->columns[$name] = (object) $settings;
    }

    public function getColumns()
    {
        if (is_array($this->columns)) {
            $this->columns = collect($this->columns);
        }
        return $this->columns;
    }
}