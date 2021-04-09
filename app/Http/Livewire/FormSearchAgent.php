<?php

namespace App\Http\Livewire;

use App\Facade\ApiSetting;
use Livewire\Component;

/**
 * Class FormSearchAgent
 * @package App\Http\Livewire
 */
class FormSearchAgent extends Component
{
    public $param = [];
    public $provinces;
    public $districts;
    public $province_id;
    public $district_id;

    /**
     * init data
     */
    public function mount() {
        $provinces = ApiSetting::listProvinces(['limit' => 64]);
        if( isset($provinces) && $provinces)
        {
            $this->provinces = $provinces['data']['data'];
        } else {
            $this->provinces = [];
        }

        $this->districts = [];

        if (isset($this->param['province_id']) && $this->param['province_id'] != '') {
            $districts = ApiSetting::listDistricts(['province_id' => $this->param['province_id']]);
            if( isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {
                $this->districts = $districts['data']['data'];
            } else {
                $this->districts = [];
            }

        }
    }

    /**
     * function getDistricts
     */
    public function getDistricts() {

        if( $this->param['province_id'] != '') {
            $districts = ApiSetting::listDistricts(['province_id' => $this->param['province_id']]);
            if(isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {
                $this->districts = $districts['data']['data'];
            } else {
                $this->districts = [];
            }
        } else {
            $this->districts = [];
        }

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $param = $this->param;
        return view('livewire.form-search-agent', $param);
    }
}
