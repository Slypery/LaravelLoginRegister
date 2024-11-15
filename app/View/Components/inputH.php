<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputH extends Component
{
    /**
     * Create a new component instance.
     */
    public $id, $type, $name, $label, $label_span, $placeholder, $required, $value;
    public function __construct($id, $type, $name, $label, $placeholder, $labelSpan = 3, $required = false, $value = null)
    {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->label_span = $labelSpan;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-h');
    }
}
