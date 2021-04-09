<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use App\Repositories\LandingPagePosition\LandingPagePositionRepositoryInterface;
use Illuminate\Http\Request;

class LandingPagesController extends Controller
{
    protected $data = [];
    protected $repoLandingPage;

    public function __construct(LandingPagePositionRepositoryInterface $landingPagePositionRepository)
    {
        $this->repoLandingPage = $landingPagePositionRepository;
    }

    public function aboutUs(Request $request)
    {

        $positions = ApiSetting::apiIntrodure()['data'];
//        dd($positions);
        if(isset($positions) && !is_null($positions) && isset($positions['title_content']['landing_page_id']) && !is_null($positions['title_content']['landing_page_id'])) {
            $data['positions']  = $positions;
            $data['landing_page_id'] = $positions['title_content']['landing_page_id'];
        } else {
            $data['positions']  = [];
            $data['landing_page_id'] = [];
        }
        return view('landing-pages.about-us', $data);
    }
}
