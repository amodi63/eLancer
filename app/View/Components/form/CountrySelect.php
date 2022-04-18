<?php

namespace App\View\Components\form;

use Illuminate\View\Component;
use Symfony\Component\Intl\Languages;

class input extends Component
{
    public $selected;
    public $countries;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selected = null)
    {
        $this->selected = $selected;
        // $this->countries = Languages::getNames();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.country-select');
    }
}
