<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render(): Application|Factory|View|\Illuminate\Foundation\Application
    {
        return view('layouts.admin');
    }
}
