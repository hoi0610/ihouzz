<?php

namespace App\Http\Livewire;

use App\Facade\ApiSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class QuickSearchProperty extends Component
{
    public $provinces;
    public $districts;
    public $streets;
    public $province_id;
    public $district_id;
    public $street_id;
    public $linkAction;


    public function updatedDistrictId() {
        if($this->district_id != '') {
            $this->linkAction = route('valuation.district', $this->district_id);
        } elseif ($this->district_id == '') {
            $this->linkAction = route('valuation.all');
        }
    }

    public function updatedStreetId() {
        if($this->street_id != '' ) {
            $this->linkAction = route('valuation.street', ['district_id' => $this->district_id, 'street_id' => $this->street_id]);
        } else {
            $this->linkAction = route('valuation.district', $this->district_id);
        }
    }
    public function mount() {
        if(!is_null(request('province_id')) && request('province_id') != '') {
            $this->province_id = request('province_id');
            $districts = ApiSetting::listDistricts(['province_id' => $this->province_id]);
            if( isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {
                $this->districts = $districts['data']['data'];
            } else {
                $this->districts = [];
            }
        }
        if(!is_null(request('district_id')) && request('district_id') != '') {
            $this->district_id = request('district_id');
            $streets = ApiSetting::listStreets(['district_id' => $this->district_id]);
            if( isset($streets) && !is_null($streets) && isset($streets['data']['data']) && !is_null($streets['data']['data'])) {
                $this->streets = $streets['data']['data'];
            } else {
                $this->streets = [];
            }
        }
        if(!is_null(request('street_id')) && request('street_id') != '') {
            $this->street_id = request('street_id');
        }
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
        $this->linkAction = route('valuation.all');
    }

    public function getDistricts() {
        if( $this->province_id != '' ) {
            $districts = ApiSetting::listDistricts(['province_id' => $this->province_id]);
            if(isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {
                $this->districts = $districts['data']['data'];
            } else {
                $this->districts = [];
            }
        } else {
            $this->districts = [];
        }

        $this->streets = [];
    }

    public function getStreets() {
        if( $this->district_id != '' ) {
            $streets = ApiSetting::listStreets(['district_id' => $this->district_id]);
            if(isset($streets) && !is_null($streets) && isset($streets['data']['data']) && !is_null($streets['data']['data'])) {
                $this->streets = $streets['data']['data'];
            } else {
                $this->streets = [];
            }
        } else {
            $this->streets = [];
        }

    }
    public function render()
    {
        return view('livewire.quick-search-property');
    }
}
