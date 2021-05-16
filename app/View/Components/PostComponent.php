<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void

     */
    public $posts;
    // public $user;

    public function __construct($posts)
    {
        // $this->user=$user;
        $this->posts=$posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.post-component');
    }
}
