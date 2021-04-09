<?php

namespace App\View\Components;

use App\Facade\ApiSetting;
use Illuminate\View\Component;

class CountProductSell extends Component
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
        $dataCate = ApiSetting::countByCategory();
        $dataProvince = ApiSetting::countByProvince();

        return view('components.count-product-sell')->with([
            'cates' => $dataCate,
            'provinces' => $dataProvince,
        ]);
    }
}
