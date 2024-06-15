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
    public $id;
    public $name;
    public function __construct($accept, $id, $name)
    {
        //
        $this->accept = $accept;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utils.doc-file-input');
    }
}
