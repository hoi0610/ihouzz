<?php

namespace App\Facade;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use App\Services\ApiRequestService;

class ApiSetting extends Facade {

    /**
     * @param $product_id
     * @return \Illuminate\Http\Client\Response
     *
     * get tien-ich-khu-vuc
     */
    public static function getAreaUtility($product_id)
    {
        $request = new ApiRequestService();

        // list local near
        $datas = $request->get(env('API_BASE_URL'). 'products/'. $product_id. '/utility-nearby', []);

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * get list country
     */
    public static function listCountry($param)
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'locations/countries', $param);

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * get list Provinces
     */
    public static function listProvinces($param)
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'locations/provinces', $param);

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * get list Districts
     */
    public static function listDistricts($param)
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'locations/districts', $param);

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * get list wards
     */
    public static function listWards($param)
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'locations/wards', $param);

        return $datas;
    }


    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * get list wards
     */
    public static function listStreets($param)
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'locations/streets', $param);

        return $datas;
    }

    /**
     * @param $param
     * @return mixed
     *
     * login with customer
     */
    public static function login($type, $param)
    {
        $request = new ApiRequestService();
        if($type == 'agent') {
            $datas = $request->post(env('API_BASE_AUTH'). 'agents/auth/login', $param);
        } elseif($type == 'customer') {
            $datas = $request->post(env('API_BASE_URL'). 'auth/login', $param);
        }  elseif($type == 'social') {
            $datas = $request->post(env('API_BASE_URL'). 'auth/social', $param);
        }

        return $datas;
    }

    /**
     * @param $param
     * @return mixed
     *
     * register with agent
     */
    public static function registerAgent($param)
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'agent/register', $param);

        return $datas;
    }

    /**
     * @param $param
     * @return mixed
     *
     * register with agent
     */
    public static function registerCustomer($param)
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'auth/register', $param);

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * api danh sach nha ban
     */
    public static function listProduct($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'products/search', $param);

        return $datas;
    }

    /**
     * @param $productId
     * @return \Illuminate\Http\Client\Response
     *
     * api chi tiet nha ban
     */
    public static function detailProduct($productId)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'products/'.$productId, []);

        return $datas;
    }

    /**
     * @param $category_id
     * @return \Illuminate\Http\Client\Response
     *
     * Api - số lượng bất động sản theo loại
     */
    public static function countRealEstateByCategory($category_id)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'count-by-category/'.$category_id, []);

        return $datas;
    }

    /**
     * @param $category_id
     * @return \Illuminate\Http\Client\Response
     *
     * Api - số lượng bds theo khu vực
     */
    public static function countRealEstateByProvince($id)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'count-by-province/'.$id, []);

        return $datas;
    }

    /**
     * @param $category_id
     * @return \Illuminate\Http\Client\Response
     *
     * Api - Sản phẩm cùng đường
     */
    public static function listProductSameStreet($product_id)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'products/'. $product_id .'/same-street', []);

        return $datas;
    }
    /**
     * @param $category_id
     * @return \Illuminate\Http\Client\Response
     *
     * Api - Sản phẩm cùng tầm giá
     */
    public static function listProductSamePrice($product_id)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'products/'. $product_id .'/same-price', []);

        return $datas;
    }

    /**
     * @return \Illuminate\Http\Client\Response
     *
     * api du lieu homepage
     */
    public static function apiHomePage()
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'home', []);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @return \Illuminate\Http\Client\Response
     *
     * api du lieu trang gioi thieu
     */
    public static function apiIntrodure()
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'landing-page/about-us', []);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param array $param
     * @return \Illuminate\Http\Client\Response
     *
     * api so nha ban theo khu vuc
     */
    public static function countByProvince($param = []){
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'products/count-by-province/1', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param array $param
     * @return \Illuminate\Http\Client\Response
     *
     * api so nha ban theo loai
     */
    public static function countByCategory($param = [])
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'products/count-by-category/1', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function infoCustomer()
    {
        $request = new ApiRequestService();

        $datas = $request->getWithAuth(env('API_BASE_URL'). 'auth/detail-info');
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $id
     * @param $param
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * update employee
     */
    public static function employeeUpdate($id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->putWithAuth(env('API_BASE_URL'). 'employee/auth/'.$id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach du an
     */
    public static function listProject($param)
    {
        $request = new ApiRequestService();
        $datas = $request->get(env('API_BASE_URL'). 'projects', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];
        return $datas;
    }

    /**
     * @param $category_id
     * @return \Illuminate\Http\Client\Response
     *
     * Api - Project cùng tầm giá
     */
    public static function listProjectSamePrice($project_id)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'projects/'. $project_id .'/same-price', []);

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * detail du an
     */
    public static function detailProject($id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'projects/'.$id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * detail du an
     */
    public static function detailAgent($id, $param=[])
    {
        $request = new ApiRequestService();
        $datas = $request->get(env('API_BASE_URL'). 'agent/'.$id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * Danh sach category cua product
     */
    public static function listProductCategories($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'product-categories', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * Thong tin chi tiet chuyen vien moi gioi
     */
    public static function detailEmployee($id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'employees/' . $id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach product directions
     */
    public static function listProductDirections($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'product-directions', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach product type
     */
    public static function listProductTypes($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'product-types', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }
    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach menu item
     */
    public static function listMenuItem($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'menu-items', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach goi vay hot
     */
    public static function loanPackageHots($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'loan-packages/hot', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach dai ly
     */
    public static function listAgents($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'agent', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];
        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * doi mat khau
     */
    public static function changePassword($param)
    {
        $request = new ApiRequestService();
        if(Auth::guard('jwt')->user()['type'] == 'agent') {
            $datas = $request->postWithAuth(env('API_BASE_AUTH'). 'agents/auth/change-password', $param);
        } else {
            $datas = $request->postWithAuth(env('API_BASE_URL'). 'auth/change-password', $param);
        }
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach san phan cua dai ly
     */
    public static function listProductBeManaged($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'products', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }


    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach san phan cua dai ly
     */
    public static function listProductBookingDones($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'products/booking-done', $param);

        return $datas;
    }

    /**
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach san cua dai ly
     */
    public static function listPosByAgent($id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'pos/'.$id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach tin tuc
     */
    public static function listNews($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'news', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * tin tuc category
     */
    public static function newsByCategory($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'news/categories', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * chi tiet tin tuc
     */
    public static function detailNews($id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'news/'.$id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach goi vay
     */
    public static function listLoan($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'loan-packages', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * chi tiet gói vay
     */
    public static function detailLoanPackage($id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'loan-packages/' . $id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * list faq category
     */
    public static function listFaqCategory($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'faq-categories', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     */
    public static function detailFaqByCategory($id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'faq-detail/'.$id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * get post by slug
     */
    public static function getPageBySlug($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'page', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * KY GUI BĐS
     */
    public static function saveConsignment($param, $arrayFile)
    {
        $request = new ApiRequestService();

        $datas = $request->postWithFile(env('API_BASE_URL'). 'consignment', $param, $arrayFile);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * list nhu cau bat dong san
     */
    public static function listOtherNeedsProperty($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'consignment/list-other-needs', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * list loai so huu BĐS
     */
    public static function listOwnerTypeProperty($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'consignment/list-type', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * Danh sach tinh trang cua product
     */
    public static function listProductStatus($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'product-status', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * Danh sach feature cua product
     */
    public static function listProductFeatureVariants($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'product-feature-variants', $param);

        return $datas;
    }

    /**
     * @param $province_id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach gia bds theo quan
     */
    public static function listPriceRangeByProvince($province_id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'property-prices/get-property-price-district-by-province/'.$province_id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $province_id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach gia bds theo tat ca cac quan
     */
    public static function listPriceRangeAllProvince($param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'property-prices/', $param);

        return $datas;
    }

    /**
     * @param $district_id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach gia theo loai bds trong 1 quan
     */
    public static function listPriceRangeByDistrict($district_id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'property-prices/get-property-price-type-by-district/'.$district_id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $district_id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach gia bds theo duong
     */
    public static function listPriceRangeByStreet($district_id, $param)
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'property-price-streets/get-property-price-streets-by-district/'.$district_id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * compare goi vay
     */
    public static function compareLoanPackage($param)
    {
        $request = new ApiRequestService();

        $datas = $request->postWithFormData(env('API_BASE_URL'). 'loan-packages/compare', $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sach gia theo loai BDS trong 1 duong
     */
    public static function listPriceRangePropertyinStreet($id, $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'property-price-streets/get-property-price-streets-type-time-by-street/'.$id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sách giá theo quận và thời gian
     */
    public static function listPriceRangeDistrictByTime($district_id, $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'property-prices/get-property-price-time-by-district/'.$district_id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }
    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * danh sách giá theo đường và thời gian
     */
    public static function listPriceRangeStreetByTime($street_id, $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'property-price-streets/get-property-price-streets-time-by-street/'.$street_id, $param);
        $datas['data'] = !empty($datas['data']) ? $datas['data'] : [];

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * API - danh sách đường có giá bđs cao nhất (thấp nhất) trong quận
     */
    public static function listPriceRangeMinMaxInDistrict( $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->get(env('API_BASE_URL'). 'property-price-streets/get-property-price-streets-list-min-max-by-district', $param);

        return $datas;
    }
    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * api get danh sach bds theo duong voi category
     */
    public static function listPriceRangeStreetByCategory( $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'property-price-streets/get-property-price-streets-by-category', $param);

        return $datas;
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * api get list bds cua toi
     */
    public static function listMyProperty()
    {
        $request = new ApiRequestService();

        $datas = $request->getWithAuth(env('API_BASE_AUTH'). 'auth/my-property');

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * api save favorite product
     */
    public static function saveFavoriteProduct( $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->postWithAuth(env('API_BASE_URL'). 'auth/favorite', $param);

        return $datas;
    }
    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * api delete favorite product
     */
    public static function destroyFavoriteProduct( $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->postWithAuth(env('API_BASE_URL'). 'auth/delete-favorite', $param);

        return $datas;
    }
    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * api get danh sach favorite product
     */
    public static function getFavoriteProducts( $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->getWithAuth(env('API_BASE_URL'). 'auth/favorites', $param);

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * api dang ky goi vay
     */
    public static function registerLoanPackage( $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'loan-packages/register', $param);

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * api dang ky tu van
     */
    public static function registerAdvisory( $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'booking/send-mail-booking', $param);

        return $datas;
    }

    /**
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * api dang ky tu van
     */
    public static function registerHomView( $param=[])
    {
        $request = new ApiRequestService();

        $datas = $request->post(env('API_BASE_URL'). 'booking/send-mail-booking-house', $param);

        return $datas;
    }

}
