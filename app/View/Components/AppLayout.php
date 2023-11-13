<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title;

    public function __consturct(string $title = "LARAVEL APP")
    {
        $this->title = $title;
    }

    public function render(): View|Closure|string
    {
        return view('components.app-layout');
    }
}
