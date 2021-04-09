<?php

namespace App\View\Components;

use App\Facade\ApiSetting;
use App\Services\ApiRequestService;
use Illuminate\View\Component;

class SearchListProduct extends Component
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
        // call api
        $api = new ApiRequestService();

        // list provinces
        $provinces = ApiSetting::listProvinces([]);
        $whereDistrict = [];
        if($provinces) {
            $whereDistrict = ['province_id' => $provinces['data']['data'][0]['province_id']];
        }
        $districts = ApiSetting::listDistricts($whereDistrict);
        $whereWard = [];
        if($districts) {
            $whereWard = ['district_id' => $districts['data']['data'][0]['district_id']];
        }
        $wards = ApiSetting::listWards($whereWard);

        return view('components.search-list-product', [
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards,
        ]);
    }
}
