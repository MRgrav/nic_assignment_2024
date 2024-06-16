<?php

namespace App\View\Components\utils;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PhoneInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $value;
    public function __construct($id, $value)
    {
        //
        $this->id = $id;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utils.phone-input');
    }
}
