<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowProfileInPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $linkImg,
        public string $username,
        public string $paragraph,
        public ?string $createdAt = null
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-profile-in-post');
    }
}
