<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;
class LocationController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_provinces(Request $request)
    {
        $objects = Province::select('province_id', \DB::raw("CONCAT_WS(' ', type, name) as province_name"))
            ->where('is_deleted', 0)
            ->orderBy('ordering', 'asc')
            ->pluck('province_name', 'province_id')->toArray();

        return response()->json([
            'rs' => 1,
            'data' => $objects
        ]);
    }

    public function get_districts(Request $request)
    {
        $province_id = $request->input('province_id', '');

        $objects = District::select('district_id', \DB::raw("CONCAT_WS(' ', type, name) as district_name"))
            ->where('province_id', $province_id)
            ->where('is_deleted', 0)
            ->pluck('district_name', 'district_id');

        return response()->json([
            'rs' => 1,
            'data' => $objects
        ]);
    }

    public function get_wards(Request $request)
    {
        $district_id = $request->input('district_id', '');

        $objects = Ward::select('ward_id', \DB::raw("CONCAT_WS(' ', type, name) as ward_name"))
            ->where('district_id', $district_id)
            ->where('is_deleted', 0)
            ->pluck('ward_name', 'ward_id');

        return response()->json([
            'rs' => 1,
            'data' => $objects
        ]);
    }

    public function getAddressByProvince($province_id){
        $object = Province::select(
            \DB::raw("CONCAT_WS(' ', provinces.type, provinces.name) as province_name")
        )
            ->where('province_id', $province_id)
            ->first();

        $address = [];
        if ($object['province_name']) {
            $address[] = $object['province_name'];
        }

        $address = implode(", ", array_reverse($address));
        return $address;
    }

    public function getAddressByDistrict($district_id, $ward=null){
        $ward = $ward ? $ward : District::select(
            \DB::raw("CONCAT_WS(' ', provinces.type, provinces.name) as province_name"),
            \DB::raw("CONCAT_WS(' ', districts.type, districts.name) as district_name")
        )
            ->where('district_id', $district_id)
            ->leftJoin('provinces', 'provinces.province_id', '=', 'districts.province_id')
            ->first();

        $address = [];
        if ($ward['province_name']) {
            $address[] = $ward['province_name'];
        }

        if ($ward['district_name'] && strpos($address[0], $ward['district_name']) === false) {
            $address[] = $ward['district_name'];
        }

        if (isset($ward['ward_name'])) {
            $address[] = $ward['ward_name'];
        }

        $address = implode(", ", array_reverse($address));
        return $address;
    }

    public function getAllDistricts(Request $request)
    {
        $limit  = $request->input('limit', env('LIMIT_LIST', 10));
        $kw     = $request->input('q', '');

        $objects = District::select('district_id as id', \DB::raw("CONCAT_WS(' ', type, name) as text"))
            ->where('is_deleted', 0);

        if ($kw) {
            $objects->where(\DB::raw("CONCAT_WS(' ', type, name)"), 'LIKE', '%'.$kw.'%');
        }

        $objects = $objects->paginate($limit)->toArray();

        return response()->json([
            "results" => $objects['data'],
            "pagination" => ["more" => true]
        ]);
    }
}
