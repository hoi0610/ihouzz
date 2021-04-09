<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormRegisterAdvisoryAndHomeView extends Component
{
    public $productId;
    public $projectId;
    public $blockId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($productId, $projectId)
    {
        $this->productId = $productId;
        $this->projectId = $projectId;
        if($productId) {
            $this->blockId = $productId;
        } else {
            $this->blockId = $projectId;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-register-advisory-and-home-view');
    }
}
