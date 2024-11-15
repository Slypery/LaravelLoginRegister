<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $name, $label, $label_span;
    public function __construct($id, $name, $label, $label_span = 3)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->label_span = $label_span;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-select');
    }
}
