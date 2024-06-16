<?php

namespace App\View\Components\utils;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $placeholder;
    public $id;
    public $value;
    public $autocomplete;

    public function __construct($name, $id, $value, $placeholder, $autocomplete)
    {
        //
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->autocomplete = $autocomplete;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utils.text-input');
    }
}
