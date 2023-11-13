<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $variant;
    public $hasDot = false;

    public $hasBackground = false;

    public $background = "";

    private $variants = [
        "primary" => "emerald",
        "danger" => "red",
        "secondary" => "gray"
    ];


    /**
     * Create a new component instance.
     */
    public function __construct(string $variant = "primary", bool $hasDot = false, bool $hasBackground = false)
    {
        $this->variant = $this->variants[$variant];
        $this->hasDot = $hasDot;
        $this->background = $hasBackground ? "bg-" . $this->variants[$variant] . "-100 px-3" : "";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
