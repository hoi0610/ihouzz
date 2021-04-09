<?php

namespace App\Http\Livewire;

use App\Facade\ApiSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class TablePriceRangeByProvince extends Component
{
    public $provinces;
    public $province_id;
    public $listPriceRange = [];
    public $currentDate;
    public $provinceName = '';

    public function mount() {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $expiresAt = Carbon::now()->addMinutes(120*60);
        if(!Cache::has('provinces')) {
            $provinces = ApiSetting::listProvinces(['limit' => 64]);
            if( isset($provinces) && !is_null($provinces) && isset($provinces['data']['data']) && !is_null($provinces['data']['data'])) {
                Cache::add('provinces', $provinces['data']['data'], $expiresAt);
            } else {
                Cache::add('provinces', [], $expiresAt);
            }
        }
        $this->provinces = Cache::get('provinces');
        if(!is_null(request('province_id')) && request('province_id')) {
            $this->province_id = request('province_id');

        }
        if(!is_null($this->province_id)) {
            $listPriceRange = ApiSetting::listPriceRangeByProvince($this->province_id, ['month' => $currentMonth, 'year' => $currentYear]);
            if(isset($listPriceRange) && !is_null($listPriceRange) && isset($listPriceRange['data']) && !is_null($listPriceRange['data'])) {
                $this->listPriceRange = $listPriceRange['data'];
            } else {
                $this->listPriceRange = [];
            }
        } else {
            $listPriceRange = ApiSetting::listPriceRangeAllProvince(['month' => $currentMonth, 'year' => $currentYear]);
            if(isset($listPriceRange) && !is_null($listPriceRange) && isset($listPriceRange['data']) && !is_null($listPriceRange['data'])) {
                $this->listPriceRange = $listPriceRange['data'];
            } else {
                $this->listPriceRange = [];
            }
        }
        $this->currentDate = Carbon::now()->format('m/Y');
        $this->provinceName = collect($this->provinces)->filter(function ($item, $key) {
            return $item['province_id'] == $this->province_id;
        })->pluck('name')->first();

    }

    public function getListPriceRangeByProvince() {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        if(!is_null($this->province_id) && $this->province_id != '') {
            $listPriceRange = ApiSetting::listPriceRangeByProvince($this->province_id, ['month' => $currentMonth, 'year' => $currentYear]);
            if(isset($listPriceRange) && !is_null($listPriceRange) && isset($listPriceRange['data']) && !is_null($listPriceRange['data'])) {
                $this->listPriceRange = $listPriceRange['data'];
            } else {
                $this->listPriceRange = [];
            }
            $this->provinceName = collect($this->provinces)->filter(function ($item, $key) {
                return $item['province_id'] == $this->province_id;
            })->pluck('name')->first();
        } else {
            $expiresAt = Carbon::now()->addMinutes(120*60);
            if(!Cache::has('listPriceRange')) {
                $listPriceRange = ApiSetting::listPriceRangeAllProvince(['month' => $currentMonth, 'year' => $currentYear]);
                if(isset($listPriceRange) && !is_null($listPriceRange) && isset($listPriceRange['data']) && !is_null($listPriceRange['data']))
                {
                    Cache::add('listPriceRange', $listPriceRange['data'], $expiresAt);
                } else {
                    Cache::add('listPriceRange', [], $expiresAt);
                }
            }
            $this->listPriceRange = Cache::get('listPriceRange');

            $this->provinceName = '';
        }


    }

    public function render()
    {
        return view('livewire.table-price-range-by-province');
    }
}
