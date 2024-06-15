<?php

namespace App\View\Components\utils;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DocFileInput extends Component
{
    /**
     * Create a new component instance.
     */
    public $accept;
    public function __construct($accept)
    {
        //
        $this->accept = $accept;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utils.doc-file-input');
    }
}
