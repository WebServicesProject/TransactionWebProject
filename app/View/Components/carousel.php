<?php

namespace App\View\Components;

use Illuminate\View\Component;

class carousel extends Component
{
    public $imageUrls;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imageUrls)
    {
//        dd($imageUrls);
        $this->imageUrls = $imageUrls;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel');
    }
}
