<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use App\Repositories\Agents\AgentsRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class AgentsController
 * @package App\Http\Controllers
 */
class AgentsController extends Controller
{
    /**
     * @var string
     */
    protected $view = 'agents';

    /**
     * AgentsController constructor.
     * @param AgentsRepositoryInterface $repo
     */
    public function __construct(AgentsRepositoryInterface $repo){
        $this->repo = $repo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $params['filters'] = [
            'all' => 'Tất cả',
            'is_special' => 'Đại lý nổi bật',
            'is_hot' => 'Đại lý hot',
            'near' => 'Đại lý gần bạn',
        ];

        $params['filter'] = 'all';

        if(!empty($request->query())) {
            if (isset($request->query()['filter'])) {
                $params['filter'] = $request->query()['filter'];
            }
            $params = array_merge($request->query(), $params);
            $dataApi = ApiSetting::listAgents($params);
            if(isset($dataApi) && !is_null($dataApi) && isset($dataApi['data']) && !is_null($dataApi['data'])) {
                $data = $dataApi['data'];
            } else {
                $data = [];
            }
        } else {

            $dataApi = ApiSetting::listAgents([]);
            if(isset($dataApi) && !is_null($dataApi) && isset($dataApi['data']) && !is_null($dataApi['data'])) {
                $data = $dataApi['data'];
            } else {
                $data = [];
            }
        }

        return view($this->view.'.index', compact('data', 'params'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id){
        $param = array_merge($request->query());
        $data = ApiSetting::detailAgent($id);
        if(empty($data['data'])){
            abort(404);
        }
        $data = $data['data'];

        //get info pos
        $posApi = ApiSetting::listPosByAgent($id, []);

        if(isset($posApi) && !is_null($posApi) && isset($posApi['data']) && !is_null($posApi['data'])) {

            $data['pos'] = $posApi['data'];
        } else {
            $data['pos']  = [];
        }


        //get list bds dang quan ly
        $productBeManaged = ApiSetting::listProductBeManaged(['agent_id' => 11]);
        if(isset($productBeManaged) && !is_null($productBeManaged) && isset($productBeManaged['data']['data']) && !is_null($productBeManaged['data']['data'])) {
            $data['productBeManaged'] = $productBeManaged['data']['data'];
        } else {
            $data['productBeManaged'] = [];
        }


        //get list booking done
        $productBookingDone = ApiSetting::listProductBookingDones(['agent_id' => 11]);
        if(isset($productBookingDone) && !is_null($productBookingDone) && isset($productBookingDone['data']['data']) && !is_null($productBookingDone['data']['data'])) {
            $data['productBookingDone'] = $productBookingDone['data']['data'];
        } else {
            $data['productBookingDone'] = [];
        }
        return view($this->view.'.show', compact('data', 'param'));
    }
}
