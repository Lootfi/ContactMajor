<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SocialSignup extends Component
{

    public $login;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($login)
    {
        $this->login = $login;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.social-signup');
    }
}
