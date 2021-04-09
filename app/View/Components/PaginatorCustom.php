<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PaginatorCustom extends Component
{

    protected $data;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.paginator-custom')->with(['data' => $this->data]);
    }
}
