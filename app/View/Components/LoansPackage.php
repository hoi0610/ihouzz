<?php

namespace App\View\Components;

use App\Facade\ApiSetting;
use Illuminate\View\Component;

class LoansPackage extends Component
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
        $whereDistrict = ['limit' => 0];
        $data = ApiSetting::loanPackageHots($whereDistrict);
        if(isset($data) && !is_null($data) && isset($data['data']['data']) && !is_null($data['data']['data'])) {
            $loanPackageHot = collect($data['data']['data'])->take(2)->all();
            $allLoanPackage = collect($data['data']['data'])->pluck('bank')->all();
        } else {
            $loanPackageHot = [];
            $allLoanPackage = [];
        }
        return view('components.loans-package', compact('loanPackageHot', 'allLoanPackage'));
    }
}
