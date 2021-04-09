<?php

namespace App\Http\Controllers;


use App\Facade\ApiSetting;
use App\Repositories\LandingPagePosition\LandingPagePositionRepositoryInterface;
use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $data = [];
    protected $repo_landing;
    protected $productsRepository;

    public function __construct(
        LandingPagePositionRepositoryInterface $landingPagePositionRepository,
        ProductsRepositoryInterface $productsRepository
    )
    {
        $this->repo_landing = $landingPagePositionRepository;
        $this->productsRepository = $productsRepository;
    }

    public function index(Request $request)
    {
        $dataApi = ApiSetting::apiHomePage();
        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }

        return view('home.index', ['data' => $data]);
    }
}
