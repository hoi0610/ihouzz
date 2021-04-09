<?php

namespace App\Http\Controllers;


use App\Facade\ApiSetting;
use App\Repositories\News\NewsRepositoryInterface;

use Illuminate\Http\Request;

/**
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{

    /**
     * @var string
     */
    protected $view = 'news';

    /**
     * NewsController constructor.
     * @param NewsRepositoryInterface $repo
     */
    public function __construct(NewsRepositoryInterface $repo){
        $this->repo = $repo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * tin-tuc
     */
    public function index(Request $request)
    {
        if(!empty($request->query())) {
            $param = $request->query();
            $dataApi = ApiSetting::listProject($param);
            if(isset($dataApi) && $dataApi) {
                $data = $dataApi;
            } else {
                $data = [];
            }
        } else {
            $dataApi = ApiSetting::listProject([]);
            if(isset($dataApi) && $dataApi) {
                $data = $dataApi;
            } else {
                $data = [];
            }
        }
//        dd($data);
        return view('news.tin-tuc', $data);
    }

    /**
     * cam nang
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handbook() {
        return view('news.cam-nang');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * tin-tuc-detail
     */
    public function detail($id)
    {
        $dataApi = ApiSetting::detailNews($id, []);
        if(isset($dataApi) && $dataApi) {
            $data = $dataApi;
        } else {
            $data = [];
        }

        return view('news.tin-tuc-detail', $data);
    }

    /**
     * Cam nang detail
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handbookDetail($id){
        $dataApi = ApiSetting::detailNews($id, []);
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }
        return view($this->view.'.cam-nang-detail', $data);
    }

    /**
     * phong-thuy
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fengShui(Request $request) {
        $param = [
            'category_id' => 11,
            'limit' => 8
        ];
        if(!empty($request->query())) {
            $param = array_merge($request->query(), $param);
            $dataApi = ApiSetting::listNews($param);
            if(isset($dataApi) && !is_null($dataApi)) {
                $data = $dataApi;
            } else {
                $data = [];
            }
        } else {
            $dataApi = ApiSetting::listNews($param);
            if(isset($dataApi) && !is_null($dataApi)) {
                $data = $dataApi;
            } else {
                $data = [];
            }
        }
        return view('news.phong-thuy', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * phong-thuy-detail
     */
    public function fengShuiDetail($id)
    {
        $dataApi = ApiSetting::detailNews($id, []);
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }
        return view('news.phong-thuy-detail', $data);
    }

    /**
     * tai-chinh
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function finance(Request $request)
    {
        $param = [
            'category_id' => 4,
            'limit' => 8
        ];
        if(!empty($request->query())) {
            $param = array_merge($request->query(), $param);
            $dataApi = ApiSetting::listNews($param);
            if(isset($dataApi) && !is_null($dataApi)) {
                $data = $dataApi;
            } else {
                $data = [];
            }
        } else {
            $dataApi = ApiSetting::listNews($param);
            if(isset($dataApi) && !is_null($dataApi)) {
                $data = $dataApi;
            } else {
                $data = [];
            }
        }
        dd($data);
        return view('news.tai-chinh', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * tai-chinh-detail
     */
    public function financeDetail($id)
    {
        $dataApi = ApiSetting::detailNews($id, []);
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }

        return view('news.tai-chinh-detail', $data);
    }

    public function exterior(Request $request)
    {
        $param = [
            'category_id' => 4, //TODO category_id
            'limit' => 8
        ];
        if(!empty($request->query())) {
            $param = array_merge($request->query(), $param);
            $dataApi = ApiSetting::listNews($param);
            if(isset($dataApi) && !is_null($dataApi)) {
                $data = $dataApi;
            } else {
                $data = [];
            }
        } else {
            $dataApi = ApiSetting::listNews($param);
            if(isset($dataApi) && !is_null($dataApi)) {
                $data = $dataApi;
            } else {
                $data = [];
            }
        }

        return view('news.noi-ngoai-that', $data);
    }

    public function exteriorDetail($id)
    {
        $dataApi = ApiSetting::detailNews($id, []);
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }
        return view('news.noi-ngoai-that-detail', $data);
    }
}
