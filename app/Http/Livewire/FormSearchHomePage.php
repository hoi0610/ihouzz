<?php

namespace App\Http\Livewire;

use App\Facade\ApiSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Livewire\Component;

class FormSearchHomePage extends Component
{
    public $demand;
    public $active = '';
    public $choosen;
    public $linkAction;
    public $categories;
    public $provinces;
    public $districts;
    public $wards;
    public $province_id;
    public $district_id;
    public $ward_id;
    public $directions;
    public $direction_id;
    public $price;
    public $area;
    public $product_type_id;
    public $nameFormSearch;
    public $status_id=[];
    public $cookies =[];
    public $price_min;
    public $price_max;
    public $acreage_min;
    public $acreage_max;
    public $statuss;
    public $priceVariants;
    public $areaVariants;


    public function mount() {
        $expiresAt = Carbon::now()->addMinutes(120*60);
        if (!Cache::has('demand'))
        {
            $demand = ApiSetting::listProductTypes([]);
            if( isset($demand) && !is_null($demand) && isset($demand['data']) && !is_null($demand['data'])) {
                Cache::add('demand', $demand['data'], $expiresAt);
            } else {
                Cache::add('demand', [], $expiresAt);
            }
        }
        if(!Cache::has('categories')) {
            $categories = ApiSetting::listProductCategories([]);
            if( isset($categories) && !is_null($categories) && isset($categories['data']) && !is_null($categories['data'])) {
                Cache::add('categories', $categories['data'], $expiresAt);
            } else {
                Cache::add('categories', [], $expiresAt);
            }
        }

        if(!Cache::has('provinces')) {
            $provinces = ApiSetting::listProvinces(['limit' => 64]);
            if( isset($provinces) && !is_null($provinces) && isset($provinces['data']['data']) && !is_null($provinces['data']['data'])) {
                Cache::add('provinces', $provinces['data']['data'], $expiresAt);
            } else {
                Cache::add('provinces', [], $expiresAt);
            }
        }

        if(!Cache::has('directions')) {
            $directions = ApiSetting::listProductDirections([]);
            if( isset($directions) && !is_null($directions) && isset($directions['data']) && !is_null($directions['data'])) {
                Cache::add('directions', $directions['data'], $expiresAt);
            } else {
                Cache::add('directions', [], $expiresAt);
            }
        }

        if(!Cache::has('productFeatures')) {
            $productFeaturesApi = ApiSetting::listProductFeatureVariants([]);
            if( isset($productFeaturesApi) && !is_null($productFeaturesApi) && isset($productFeaturesApi['data']) && !is_null($productFeaturesApi['data'])) {
                Cache::add('productFeatures', $productFeaturesApi['data'], $expiresAt);
            } else {
                Cache::add('productFeatures', [], $expiresAt);
            }
        }

        if(!Cache::has('statuss')) {
            $statussApi = ApiSetting::listProductStatus([]);
            if(isset($statussApi) && !is_null($statussApi) && isset($statussApi['data']) && !is_null($statussApi['data']))
            {
                Cache::add('statuss', $statussApi['data'], $expiresAt);
            } else {
                Cache::add('statuss', [], $expiresAt);
            }
        }
        $this->demand = Cache::get('demand');
        $this->categories = Cache::get('categories');
        $this->provinces = Cache::get('provinces');
        $this->directions = Cache::get('directions');
        $productFeatures = Cache::get('productFeatures');
        $this->statuss = Cache::get('statuss');

        $this->priceVariants = collect($productFeatures)->filter(function ($item, $key) {
            return strpos($item['name'], 'Giá') !== false;
        })->pluck('variants')->first();
        $this->areaVariants = collect($productFeatures)->filter(function ($item, $key) {
            return strpos($item['name'], 'Diện tích') !== false;
        })->pluck('variants')->first();


        $this->active = 'active';
        $this->choosen = 0;
        $this->linkAction = route('category.nha-ban');
        $this->product_type_id = isset($this->demand[0]['id']) ? $this->demand[0]['id'] : null;
        $this->cookies = collect(Cookie::get())->filter(function ($item, $key) {
            return strpos($key, 'saveForm_') !== false;
        })->all();
        if(count($this->cookies) > 4) {
            array_shift($this->cookies);
        }
    }

    public function changeClassActive($key, $name, $id) {
        $this->choosen = $key;
        $this->product_type_id = (int)$id;
        $this->active = 'active';
        if($name == 'Nhà bán') {
            $this->linkAction = route('category.nha-ban');
        } elseif($name == 'Nhà cho thuê') {
            $this->linkAction = route('category.nha-thue');
        }
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

    public function resetFormSearch() {
        $this->province_id = '';
        $this->district_id = '';
        $this->ward_id = '';
        $this->direction_id = '';
        $this->price = '';
        $this->area = '';
        $this->status_id = [];
    }

    public function saveFormSearch() {
        $cookieTime = 300 * 60;
        if(!is_null($this->nameFormSearch)) {
            $cookie_name = 'saveForm_'.str_slug($this->nameFormSearch);
        } else {
            $cookie_name = 'saveForm_'.Str::random(16);
        }
        $data = [
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'ward_id' => $this->ward_id,
            'price' => $this->price,
            'area' => $this->area,
            'direction_id' => $this->direction_id,
            'status_id' => $this->status_id

        ];
        $cookie = Cookie::make($cookie_name, serialize($data), $cookieTime);
        $this->cookies[$cookie->getName()] = $cookie->getValue();
        if(count($this->cookies) > 4) {
            array_shift($this->cookies);
        }
        $this->nameFormSearch = '';
        Cookie::queue($cookie);
    }

    public function removeCookie($key) {
        unset($this->cookies[$key]);
        Cookie::queue(Cookie::forget($key));
    }

    public function applyCookieValueFormSearch($key) {
        $data = $this->cookies[$key];
        $data = unserialize($data);
        if( !is_null($data['province_id']) && $data['province_id'] != '') {
            $districts = ApiSetting::listDistricts(['province_id' => $data['province_id']]);
            if(isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {
                $this->districts = $districts['data']['data'];
            } else {
                $this->districts = [];
            }
        } else {
            $this->districts = [];
        }
        if( !is_null($data['district_id']) && $data['district_id'] != '') {
            $wards = ApiSetting::listWards(['district_id' => $data['district_id']]);
            if(isset($wards) && !is_null($wards) && isset($wards['data']['data']) && !is_null($wards['data']['data'])) {
                $this->wards = $wards['data']['data'];
            } else {
                $this->wards = [];
            }
        } else {
            $this->wards = [];
        }
        $this->province_id = $data['province_id'];
        $this->district_id = $data['district_id'];
        $this->ward_id = $data['ward_id'];
        $this->price = $data['price'];
        $this->area = $data['area'];
        $this->direction_id = $data['direction_id'];
        $this->status_id = $data['status_id'];
    }

    public function getPriceRange() {
        $expiresAt = Carbon::now()->addMinutes(120*60);
        if(!Cache::has('productFeatures')) {
            $productFeaturesApi = ApiSetting::listProductFeatureVariants([]);
            if( isset($productFeaturesApi) && !is_null($productFeaturesApi) && isset($productFeaturesApi['data']) && !is_null($productFeaturesApi['data'])) {
                Cache::add('productFeatures', $productFeaturesApi['data'], $expiresAt);
            } else {
                Cache::add('productFeatures', [], $expiresAt);
            }
        }
        $productFeatures = Cache::get('productFeatures');

        $priceVariants = collect($productFeatures)->filter(function ($item, $key) {
            return strpos($item['name'], 'Giá') !== false;
        })->pluck('variants')->first();
        $priceSelect = collect($priceVariants)->filter(function ($item, $key) {
            return $item['id'] == $this->price;
        })->first();
        $this->price_min = $priceSelect['from'];
        $this->price_max = $priceSelect['to'];
    }

    public function getAreaRange() {
        $expiresAt = Carbon::now()->addMinutes(120*60);
        if(!Cache::has('productFeatures')) {
            $productFeaturesApi = ApiSetting::listProductFeatureVariants([]);
            if( isset($productFeaturesApi) && !is_null($productFeaturesApi) && isset($productFeaturesApi['data']) && !is_null($productFeaturesApi['data'])) {
                Cache::add('productFeatures', $productFeaturesApi['data'], $expiresAt);
            } else {
                Cache::add('productFeatures', [], $expiresAt);
            }
        }
        $productFeatures = Cache::get('productFeatures');
        $areaVariants = collect($productFeatures)->filter(function ($item, $key) {
            return strpos($item['name'], 'Diện tích') !== false;
        })->pluck('variants')->first();
        $areaSelect = collect($areaVariants)->filter(function ($item, $key) {
            return $item['id'] == $this->area;
        })->first();
        $this->acreage_min = $areaSelect['from'];
        $this->acreage_max = $areaSelect['to'];
    }


    public function render()
    {
        return view('livewire.form-search-home-page');
    }
}
