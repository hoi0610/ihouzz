<?php

namespace Modules\Customer\Http\Controllers;

use App\Facade\ApiSetting;
use Illuminate\Http\Request;
use Modules\Customer\Services\CustomerService;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $res = ApiSetting::infoCustomer();

        return view('account.index', $res['data']);
    }

    public function myProperty () {
        $data = ApiSetting::listMyProperty();
        return view('account.my-property.index', $data);
    }
    public function myCategory () {
        return view('account.my-category.index');
    }
    public function ihouzzPay () {
        return view('account.ihouzz-pay.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('customer::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('customer::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
