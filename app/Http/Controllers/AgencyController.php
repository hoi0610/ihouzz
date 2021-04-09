<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use App\Repositories\Agents\AgentsRepositoryInterface;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    protected $data = [];
    protected $view = 'agency';

    public function __construct(AgentsRepositoryInterface $repo){
        $this->repo = $repo;

    }

    public function index($id)
    {
        $dataApi = ApiSetting::detailEmployee($id, []);
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }
        //get list bds dang quan ly
        $productBeManagedApi = ApiSetting::listProductBeManaged(['employee_in_charge' => 11]);
        if(isset($productBeManagedApi) && !is_null($productBeManagedApi) && isset($productBeManagedApi['data']['data']) && !is_null($productBeManagedApi['data']['data'])) {
            $data['data']['productBeManaged'] = $productBeManagedApi['data']['data'];
        } else {
            $data['data']['productBeManaged'] = [];
        }


        //get list booking done
        $productBookingDoneApi = ApiSetting::listProductBookingDones(['employee_in_charge' => 11]);
        if(isset($productBookingDoneApi) && !is_null($productBookingDoneApi) && isset($productBookingDoneApi['data']['data']) && !is_null($productBookingDoneApi['data']['data'])) {
            $data['data']['productBookingDone'] = $productBookingDoneApi['data']['data'];
        } else {
            $data['data']['productBookingDone'] = [];
        }

        return view($this->view.'.index', $data);
    }
}
