<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use App\Repositories\Agents\AgentsRepositoryInterface;
use App\Repositories\LoanPackage\LoanPackageRepository;
use Illuminate\Http\Request;

/**
 * Class LoanPackageController
 * @package App\Http\Controllers
 */
class LoanPackageController extends Controller
{
    /**
     * @var string
     */
    protected $view = 'loanpackage';

    /**
     * LoanPackageController constructor.
     * @param LoanPackageRepository $repo
     */
    public function __construct(LoanPackageRepository $repo){
        $this->repo = $repo;


    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $param = ['limit' => 6];
        if(!empty($request->query())) {
            $param = array_merge($request->query(), $param);
            $dataApi = ApiSetting::listLoan($param);
            if(isset($dataApi) && !is_null($dataApi)) {
                $data = $dataApi;
            } else {
                $data = [];

            }
        } else {
            $dataApi = ApiSetting::listLoan($param);
            if(isset($dataApi) && !is_null($dataApi)) {
                $data = $dataApi;

            } else {
                $data = [];
            }
        }

        $loanPackageApi = ApiSetting::loanPackageHots(['limit' => 0]);
        if(isset($loanPackageApi) && !is_null($loanPackageApi) && isset($loanPackageApi['data']['data']) && !is_null($loanPackageApi['data']['data'])) {
            $allLoanPackage = collect($loanPackageApi['data']['data'])->pluck('bank')->all();
        } else {
            $allLoanPackage = [];
        }
        $data['allLoanPackage'] = $allLoanPackage;

        dd($data['allLoanPackage']);
        return view($this->view.'.index', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail($id)
    {
        $dataApi = ApiSetting::detailLoanPackage($id, []);
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }
        return view($this->view.'.detail', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function support()
    {

        $param = ['slug' => 'dieu-khoan-su-dung'];
        $dataApi = ApiSetting::getPageBySlug($param);

        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }
        return view($this->view.'.customer_support',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function compare(Request $request)
    {
        $params['ids'] = $request['ids'];
        $dataApi = ApiSetting::compareLoanPackage($params);
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }
        return view($this->view.'.compare', $data);
    }

    public function applyLoanPackage(Request $request) {
        $data = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required|email',
            'customer_note' => '',
            'loanpackage_id' => ''
        ]);
        $res = ApiSetting::registerLoanPackage($data);
        if($res['status'] == 'fail') {
            return back()->with('error', $res['errors'])->withInput();
        } else {
            return back()->with('success', 'Đăng ký thành công');
        }

    }
}
