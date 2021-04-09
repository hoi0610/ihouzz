<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use App\Models\Province;
use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @var string
     */
    protected $view = 'category';
    /**
     * @var array
     */
    protected $data = [];

    /**
     * CategoryController constructor.
     * @param ProductsRepositoryInterface $repo
     */
    public function __construct(ProductsRepositoryInterface $repo){
        $this->repo = $repo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function nhaBanLayout(Request $request)
    {

        return $this->productCategory($request, 1);
    }

    public function nhaThueLayout(Request $request)
    {
        return $this->productCategory($request, 2);
    }

    public function productCategory(Request $request, $product_type_id) {

        $params = ['product_type_id' => $product_type_id];
        $params['province_id'] = $request->input('province_id');

        $province_name = '';
        if(!is_null($params['province_id']) && $params['province_id'] != '') {
            $province_id = $params['province_id'];
            $provicesApi = ApiSetting::listProvinces(['limit' => 64])['data']['data'];
            if(isset($provicesApi) && $provicesApi) {
                $provices = $provicesApi;
            } else {
                $provices = [];
            }
            $province_current = collect($provices)->filter(function ($item, $key) use($province_id) {
                return $item['province_id'] == $province_id;
            })->first();
            $province_name = $province_current['type'].' '.$province_current['name'];
        }

        $params['filters'] = [
            'all'       => 'Tất cả',
            'is_hot'    => 'Nổi bật',
            'is_special'=> 'Đặc biệt',
            'near'      => 'Gần bạn',
        ];
        $params['filter'] = 'all';
        if(!empty($request->query())) {
            if (isset($request->query()['filter'])) {
                $params[$request->query()['filter']] = 1;
                $params['filter'] = $request->query()['filter'];
            }
            $params = array_merge($request->query(), $params);
        }

        $data = ApiSetting::listProduct($params);

        if(isset($data) && $data) {
            $data = $data['data'];
        } else {
            $data = [];
        }

        return view($this->view.'.cate-product', compact('data', 'params', 'province_name'));
    }

    public function show(Request $request, $id)
    {
        $data = ApiSetting::detailProduct($id);
        if(isset($data) && $data) {
            $data = $data['data'];
        } else {
            $data = [];
        }

        $dataSameStreet = ApiSetting::listProductSameStreet($id);
        if(isset($dataSameStreet) && !is_null($dataSameStreet) && isset($dataSameStreet['data']) && !is_null($dataSameStreet['data'])) {
            $dataSameStreet = $dataSameStreet['data'];
        } else {
            $dataSameStreet = [];
        }

        $dataSamePrice = ApiSetting::listProductSamePrice($id);
        if(isset($dataSamePrice) && !is_null($dataSamePrice) && isset($dataSamePrice['data']) && !is_null($dataSamePrice['data'])) {
            $dataSamePrice = $dataSamePrice['data'];
        } else {
            $dataSamePrice = [];
        }


        return view($this->view.'.show', compact('data', 'dataSameStreet', 'dataSamePrice'));
    }
}
