<?php

namespace App\View\Components;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class WorkAtName extends Component
{
    public $user_list;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->user_list = User::whereIn('role',['worker'])->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.work-at-name');
    }
}
