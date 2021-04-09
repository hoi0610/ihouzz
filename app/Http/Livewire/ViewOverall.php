<?php

namespace App\Http\Livewire;

use App\Facade\ApiSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ViewOverall extends Component
{
    public $provinces;
    public $districts;
    public $wards;
    public $projects;
    public $province_id;
    public $district_id;
    public $ward_id;
    public $project_id;

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
        if(!Cache::has('projects')) {
            $projects = ApiSetting::listProject([]);
            if( isset($projects) && !is_null($projects) && isset($projects['data']['data']) && !is_null($projects['data']['data'])) {
                Cache::add('projects', $projects['data']['data'], $expiresAt);
            } else {
                Cache::add('projects', [], $expiresAt);
            }
        }
        $this->provinces = Cache::get('provinces');
        $this->projects = Cache::get('projects');


    }

    public function getDistricts() {
        if( $this->province_id != '') {
            $districts = ApiSetting::listDistricts(['province_id' => $this->province_id]);
            if(isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {
                $this->districts = $districts['data']['data'];
            } else {
                $this->districts = [];
            }
        } else {
            $this->districts = [];
        }


        $this->wards = [];
    }

    public function getWards() {
        if( $this->district_id != '') {
            $wards = ApiSetting::listWards(['district_id' => $this->district_id]);
            if(isset($wards) && !is_null($wards) && isset($wards['data']['data']) && !is_null($wards['data']['data'])) {
                $this->wards = $wards['data']['data'];
            } else {
                $this->wards = [];
            }
        } else {
            $this->wards = [];
        }


    }

    public function render()
    {
        return view('livewire.view-overall');
    }
}
