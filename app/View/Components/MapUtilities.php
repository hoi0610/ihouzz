<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Products;
use App\Services\ApiRequestService;

class MapUtilities extends Component
{
    /**
     * @var
     */
    public $map = '';

    public $productId = '';

    /**
     * MapUtilities constructor.
     * @param $map
     *
     *
     */
    public function __construct($map, $productId)
    {
        $this->map = $map;
        $this->productId = $productId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        // call api
        $api = new ApiRequestService();

        // list local near
        $datas = $api->get(env('API_BASE_URL'). 'products/'. $this->productId. '/utility-nearby', []);

        return view('components.map-utilities')->with([
            'map' => $this->map,
            'datas' => $datas
        ]);
    }
}
