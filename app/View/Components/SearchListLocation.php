<?php

namespace App\View\Components;

use App\Facade\ApiSetting;
use App\Services\ApiRequestService;
use Illuminate\View\Component;

class SearchListLocation extends Component
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
        // list provinces
        $provinces = ApiSetting::listProvinces([]);
        $whereDistrict = [];
        if($provinces) {
            $whereDistrict = ['province_id' => $provinces['data']['data'][0]['province_id']];
        }
        $districts = ApiSetting::listDistricts($whereDistrict);

        return view('components.search-list-location', [
            'provinces' => $provinces,
            'districts' => $districts,
        ]);
    }
}
