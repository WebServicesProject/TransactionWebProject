<?php

namespace App\View\Components;

use App\Models\Book;
use Illuminate\View\Component;

class booklist extends Component
{   public $books;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($books)
    {
        //
        $this->books = $books;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.booklist');
    }
}
