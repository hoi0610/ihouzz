<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ValuationController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * xem-gia-bds.html
     */
    public function all()
    {
        return view('valuation.xem-gia-bds');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * xem-gia-bds-street.html
     */
    public function street(Request $request, $dis_id, $str_id)
    {
        if(!is_null($request->district_id) && $request->district_id != '') {
            $dis_id = $request->district_id;
        }
        if(!is_null($request->street_id) && $request->street_id != '') {
            $str_id = $request->street_id;
        }
        $districts = ApiSetting::listDistricts(['limit' => 10000]);
        dd($districts);
        if( isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {

            $districtName = collect($districts['data']['data'])->filter(function ($item, $key) use($dis_id) {
                return $item['district_id'] == $dis_id;
            })->first();
            $districtName = $districtName['type'].' '.$districtName['name'];
        } else {
            $districts = [];
            $districtName = '';
        }

        // API - danh sách giá theo loại bđs trong 1 đường
        $priceRangeApi = ApiSetting::listPriceRangePropertyinStreet($str_id);
        if(isset($priceRangeApi) && !is_null($priceRangeApi) && isset($priceRangeApi['data']) && !is_null($priceRangeApi['data'])) {
            $priceRange = $priceRangeApi['data'];
        } else {
            $priceRange = [];
        }
        $priceRange = collect($priceRange)->values()->all();
        $list = collect($priceRange)->pluck('list');
        $list = $list->map(function ($item, $key) {
            return collect($item)->keys()->all();
        })->all();
        $list = call_user_func_array("array_merge", $list);
        $list = collect($list)->map(function ($item, $key) {
            return Carbon::createFromFormat('m/Y',$item)->format('m/Y');
        });
        $list = $list->sort();
        $labels = $this->getDateRange($list->min(), $list->max());
        $list = [];
        foreach ($priceRange as $item) {
            $list[] = collect($item['list'])->mapWithKeys(function ($item, $key) {
                return [Carbon::createFromFormat('m/Y', $key)->format('m/Y') => $item];
            })->all();
        }
        $chart = [];
        $backgroundColor = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
            '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
            '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
            '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
            '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
            '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
            '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
            '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
            '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
            '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];

        foreach ($priceRange as $key => $item) {
            $k = array_rand($backgroundColor);
            $data = new \stdClass();
            $data->label = $item['name'];
            $data->backgroundColor = $backgroundColor[$k];
            $data->borderColor = $backgroundColor[$k];
            foreach ($labels as $label) {
                if(isset($list[$key][$label]) && $list[$key][$label] ) {
                    $data->data[] = $list[$key][$label]['price_average'];
                } else {
                    $data->data[] = 0;
                }
            }

            $data->fill = false;
            array_push($chart, $data);
        }

        //API - danh sách giá theo đường và thời gian
        $priceRangeDistrictTimeApi = ApiSetting::listPriceRangeDistrictByTime($dis_id);
        if(isset($priceRangeDistrictTimeApi) && !is_null($priceRangeDistrictTimeApi) && isset($priceRangeDistrictTimeApi['data']) && !is_null($priceRangeDistrictTimeApi['data'])) {
            $priceRangeDistrictTime = $priceRangeDistrictTimeApi['data'];
        } else {
            $priceRangeDistrictTime = [];
        }
        $priceRangeStreetTimeApi = ApiSetting::listPriceRangeStreetByTime($str_id);
        if(isset($priceRangeStreetTimeApi) && !is_null($priceRangeStreetTimeApi) && isset($priceRangeStreetTimeApi['data']) && !is_null($priceRangeStreetTimeApi['data'])) {
            $priceRangeStreetTime = $priceRangeStreetTimeApi['data'];
        } else {
            $priceRangeStreetTime = [];
        }
        $keyPriceDistrict = collect($priceRangeDistrictTime)->keys()->all();
        $keyPriceStreet = collect($priceRangeStreetTime)->keys()->all();
        $arr_key = array_merge($keyPriceDistrict, $keyPriceStreet);
        $arr_key = collect($arr_key)->map(function ($item, $key) {
            return Carbon::createFromFormat('m/Y',$item)->format('m/Y');
        });
        $labels2 = $this->getDateRange($arr_key->min(), $arr_key->max());
        $priceRangeDistrictTime = collect($priceRangeDistrictTime)->mapWithKeys(function ($item, $key) {
            return [Carbon::createFromFormat('m/Y', $key)->format('m/Y') => $item];
        })->all();
        $priceRangeStreetTime = collect($priceRangeStreetTime)->mapWithKeys(function ($item, $key) {
            return [Carbon::createFromFormat('m/Y', $key)->format('m/Y') => $item];
        })->all();
        $dataDistrict = [];
        $dataStreet = [];
        foreach ($labels2 as $label) {
            if(isset($priceRangeDistrictTime[$label]) && $priceRangeDistrictTime[$label] ) {
                $dataDistrict[] = $priceRangeDistrictTime[$label]['price_average'];
            } else {
                $dataDistrict[] = 0;
            }

            if(isset($priceRangeStreetTime[$label]) && $priceRangeStreetTime[$label] ) {
                $dataStreet[] = $priceRangeStreetTime[$label]['price_average'];
            } else {
                $dataStreet[] = 0;
            }
        }

        // API - danh sách đường có giá bđs cao nhất (thấp nhất) trong quận

        $priceMinApi = ApiSetting::listPriceRangeMinMaxInDistrict(['is_max' => 1, 'district_id' => $dis_id]);
        if(isset($priceMinApi) && !is_null($priceMinApi) && isset($priceMinApi['data']) && !is_null($priceMinApi['data'])) {
            $priceMin = $priceMinApi['data'];
        } else {
            $priceMin = [];
        }
        $priceMaxApi = ApiSetting::listPriceRangeMinMaxInDistrict(['is_max' => 0, 'district_id' => $dis_id]);
        if(isset($priceMaxApi) && !is_null($priceMaxApi) && isset($priceMaxApi['data']) && !is_null($priceMaxApi['data'])) {
            $priceMax = $priceMaxApi['data'];
        } else {
            $priceMax = [];
        }

        // Tham khảo giá đất Quận  cập nhật mới nhất
        $priceRangeUpdateApi = ApiSetting::listPriceRangeStreetByCategory([
            'street_id' => $str_id,
            'month' => Carbon::now()->month,
            'year' => Carbon::now()->year
        ]);
        if(isset($priceRangeUpdateApi) && !is_null($priceRangeUpdateApi) && isset($priceRangeUpdateApi['data']) && !is_null($priceRangeUpdateApi['data']))
        {
            $priceRangeUpdate = $priceRangeUpdateApi['data'];
        } else {
            $priceRangeUpdate = [];
        }

        $labels3 = collect($priceRangeUpdate)->pluck('property_type')->pluck('name')->all();
        $dataCategory = collect($priceRangeUpdate)->pluck('price_average')->all();


        return view('valuation.xem-gia-bds-street', [
            'chart' => collect($chart),
            'labels' => collect($labels),
            'labels2' => collect($labels2),
            'labels3' => collect($labels3),
            'id' => $str_id,
            'dataDistrict' => collect($dataDistrict),
            'dataStreet' => collect($dataStreet),
            'priceMin' => $priceMin,
            'priceMax' => $priceMax,
            'districtName' => $districtName,
            'priceRangeUpdate' => $priceRangeUpdate,
            'dataCategory' => collect($dataCategory)
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * xem-gia-bds-district.html
     */
    public function district(Request $request, $id)
    {
        if(!is_null($request->district_id) && $request->district_id != '') {
            $district_id = $request->district_id;
        } else {
            $district_id = $id;
        }
        $districts = ApiSetting::listDistricts(['limit' => 10000]);
        if( isset($districts) && !is_null($districts) && isset($districts['data']['data']) && !is_null($districts['data']['data'])) {
            $districtName = collect($districts['data']['data'])->filter(function ($item, $key) use($district_id) {
                return $item['district_id'] == $district_id;
            })->first();
            $districtName = $districtName['type'].' '.$districtName['name'];
        } else {
            $districts = [];
            $districtName = '';
        }
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        // get price range in district
        $priceRangeApi = ApiSetting::listPriceRangeByDistrict($district_id, ['month' =>$currentMonth, 'year' => $currentYear]);
        if(isset($priceRangeApi) && !is_null($priceRangeApi) && isset($priceRangeApi['data']) && !is_null($priceRangeApi['data'])) {
            $priceRange = $priceRangeApi['data'];
        } else {
            $priceRange = [];
        }

        return view('valuation.xem-gia-bds-district', compact('priceRange', 'id', 'districtName'));
    }

    protected function getDateRange($minDate, $maxDate) {
        $result = [];
        $start = Carbon::createFromFormat('m/Y', $minDate)->startOfMonth()->timestamp;
        $end = Carbon::createFromFormat('m/Y', $maxDate)->startOfMonth()->timestamp;
        while($start <= $end)
        {
            array_push($result, Carbon::parse($start)->format('m/Y'));
            $start = strtotime("+1 month", $start);
        }
        return $result;
    }

}
