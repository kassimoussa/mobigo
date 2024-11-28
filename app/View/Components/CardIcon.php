<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardIcon extends Component
{
    /**
     * Create a new component instance.
     */
    public $icon, $title, $url, $text; 

    public function __construct($icon, $title, $url, $text)
    {
        $this->icon = $icon ;
        $this->title = $title ;
        $this->url = $url ;
        $this->text = $text ;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-icon');
    }
}
