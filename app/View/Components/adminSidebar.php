<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class adminSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public $page_name;
    public function __construct($pageName)
    {
        $this->page_name = $pageName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-sidebar');
    }
}
