<?php

namespace App\Views\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public string $title;

    public function __consturct(string $title = "LARAVEL APP")
    {
        $this->title = $title;
    }

    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
