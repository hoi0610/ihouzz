<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use App\Repositories\Agents\AgentsRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class FaqController
 * @package App\Http\Controllers
 */
class FaqController extends Controller
{
    /**
     * @var string
     */
    protected $view = 'faq';

    /**
     * FaqController constructor.
     * @param AgentsRepositoryInterface $repo
     */
    public function __construct(AgentsRepositoryInterface $repo){
        $this->repo = $repo;

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dataApi = ApiSetting::listFaqCategory([]);
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }

        return view($this->view.'.index', $data);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail($id)
    {
        $dataApi = ApiSetting::detailFaqByCategory($id, []);
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }

        return view($this->view.'.detail', $data);
    }
}
