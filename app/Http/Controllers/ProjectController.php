<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use App\Repositories\Agents\AgentsRepositoryInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $data = [];
    protected $view = 'project';

    public function __construct(AgentsRepositoryInterface $repo){
        $this->repo = $repo;

    }

    public function list(Request $request)
    {

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

        $data = ApiSetting::listProject($params);

        if(isset($data) && !is_null($data) && isset($data['data']) && !is_null($data['data'])) {
            $data = $data['data'];
        } else {
            $data = [];
        }
        return view($this->view.'.project', compact('data', 'params'));
    }

    /**
     * @param $id
     */
    public function detail($id)
    {
        $data = ApiSetting::detailProject($id, []);
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
        $dataSamePriceApi = ApiSetting::listProjectSamePrice($id);
        if(isset($dataSamePriceApi) && !is_null($dataSamePriceApi) && isset($dataSamePriceApi['data']) && !is_null($dataSamePriceApi['data'])) {
            $dataSamePrice = $dataSamePriceApi['data'];
        } else {
            $dataSamePrice = [];
        }
        return view($this->view.'.detail', compact('data', 'dataSameStreet', 'dataSamePrice'));
    }
}
