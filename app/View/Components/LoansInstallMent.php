<?php

namespace App\View\Components;

use App\Facade\ApiSetting;
use Illuminate\View\Component;
use App\Models\Banks;

class LoansInstallMent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $bankList = Banks::all();

        return view('components.loans-install-ment')->with([
                'banks' => $bankList
        ]);
    }
}
