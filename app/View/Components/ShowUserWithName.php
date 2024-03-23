<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ShowUserWithName extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public User|\stdClass $user
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-user-with-name');
    }
}
