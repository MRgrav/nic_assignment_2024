<?php

namespace App\View\Components\utils;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuOption extends Component
{
    /**
     * Create a new component instance.
     */
    public $current;
    public function __construct($current)
    {
        //
        $this->current = $current;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utils.menu-option', compact('current'));
    }
}
