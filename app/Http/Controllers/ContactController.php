<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $view = 'contact';
    public function index()
    {
        $param = ['slug' => 'lien-he'];
        $dataApi = ApiSetting::getPageBySlug($param);

        if(isset($dataApi) && !is_null($dataApi)) {
            $data = $dataApi;
        } else {
            $data = [];
        }
        return view($this->view.'.index', $data);
    }
}
