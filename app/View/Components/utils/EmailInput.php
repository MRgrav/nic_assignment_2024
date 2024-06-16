<?php

namespace App\View\Components\utils;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmailInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $value;
    public $id;
    public $placeholder;
    public function __construct($name, $value, $id, $placeholder)
    {
        //
        $this->name = $name;
        $this->value = $value;
        $this->id = $id;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utils.email-input');
    }
}
