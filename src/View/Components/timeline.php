<?php

namespace MrShaneBarron\timeline\View\Components;

use Illuminate\View\Component;

class timeline extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('ld-timeline::components.timeline');
    }
}
