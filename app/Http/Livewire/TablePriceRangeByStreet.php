<?php

namespace App\Http\Livewire;

use App\Facade\ApiSetting;
use Livewire\Component;

class TablePriceRangeByStreet extends Component
{
    public $districtId;
    public $street;


    public function render()
    {
        $priceRangeApi = ApiSetting::listPriceRangeByStreet($this->districtId, []);
        if( isset($priceRangeApi) && !is_null($priceRangeApi) && isset($priceRangeApi['data']) && !is_null($priceRangeApi['data'])) {
            $priceRange = $priceRangeApi['data'];
        } else {
            $priceRange = [];
        }

        if(strlen($this->street) >= 2) {
            $priceRange = collect($priceRange)->filter(function ($item, $key) {
                return strpos(strtolower($item['name']), strtolower($this->street)) !== false;
            })->all();
        }
        return view('livewire.table-price-range-by-street', [
            'priceRange' => $priceRange
        ]);
    }
}
