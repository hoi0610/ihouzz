<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductSameStreetList extends Component
{
    protected $data;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product-same-street-list')->with(['data' => $this->data]);
    }
}
