<?php

namespace App\Http\Controllers;


use App\Repositories\LandingPagePosition\LandingPagePositionRepositoryInterface;
use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Http\Request;

class DemandController extends Controller
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

    public function detailRent(Request $request)
    {
        return view('demand.chi-tiet-nha-thue');
    }
}
