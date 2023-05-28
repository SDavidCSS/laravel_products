<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class LinkButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $route, public string $title, public string $buttonType, public string $icon)
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View
    {
        return view('components.link-button');
    }
}
