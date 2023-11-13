<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $variant;

    private $variants = [
        "primary" => "emerald",
        "danger" => "red",
        "secondary" => "gray"
    ];

    /**
     * Create a new component instance.
     */
    public function __construct($variant = "primary")
    {
        $this->variant = $this->variants[$variant];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
