<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.admin.sidebar');
    }
}
