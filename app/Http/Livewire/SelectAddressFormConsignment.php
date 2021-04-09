<?php

namespace App\Http\Livewire;

use App\Facade\ApiSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class SelectAddressFormConsignment extends Component
{
    public $provinces;
    public $province_id;
    public $districts;
    public $district_id;
    public $wards;
    public $ward_id;

    public function mount() {
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

        if(old('province_id') != '') {
            $this->province_id = old('province_id');
            $districts = ApiSetting::listDistricts(['province_id' => $this->province_id]);
            if( isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {
                $this->districts = $districts['data']['data'];
            } else {
                $this->districts = [];
            }

        }
        if(old('district_id') != '') {
            $this->district_id = old('district_id');
            $wards = ApiSetting::listWards(['district_id' => $this->district_id]);
            if( isset($wards) && !is_null($wards) && isset($wards['data']['data']) && !is_null($wards['data']['data'])) {
                $this->wards = $wards['data']['data'];
            } else {
                $this->wards = [];
            }

        }
        if(old('ward_id') != '') {
            $this->ward_id = old('ward_id');
        }
    }

    public function getDistricts() {
        $districts = ApiSetting::listDistricts(['province_id' => $this->province_id]);
        if( isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {
            $this->districts = $districts['data']['data'];
        } else {
            $this->districts = [];
        }

        $this->wards = [];
    }

    public function getWards() {
        $wards = ApiSetting::listWards(['district_id' => $this->district_id]);
        if( isset($wards) && !is_null($wards) && isset($wards['data']['data']) && !is_null($wards['data']['data'])) {
            $this->wards = $wards['data']['data'];
        } else {
            $this->wards = [];
        }

    }

    public function render()
    {
        return view('livewire.select-address-form-consignment');
    }
}
