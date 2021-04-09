<?php

namespace Modules\Customer\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Modules\Customer\Services\FeedbackService;

class FeedbackController extends Controller
{
    protected $service;
    public function __construct(FeedbackService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('customer::feedback.index');
    }

    public function store (Request $request){

        $params = $request->all();

        $rules = [
            'description'           => 'required',
            'captcha'           => 'required|captcha'
        ];

        $messages = [
            'captcha.required'      => 'Nhập mã xác thực',
            'captcha.captcha'       => 'Mã xác thực không đúng'
        ];

        $valid = Validator::make($params,$rules,$messages);

        if ($valid->fails())
        {
            return response()->json([
                'rs' => 0,
                'msg' => 'Dữ liệu nhập không hợp lệ',
                'errors' => $valid->errors()->messages()
            ]);
        }

        $rs = $this->service->store($params);

        if ($rs) {
            return response()->json([
                'rs'    => 1,
                'msg'   => 'Gửi Góp ý, báo lỗi thành công!',
            ]);
        }

        return response()->json([
            'rs'    => 0,
            'msg'   => 'Gửi Góp ý, báo lỗi thất bại!'
        ]);
    }
}
