<?php

namespace Modules\Customer\Http\Controllers;

use App\Helpers\Auth;
use Illuminate\Http\Request;
use Modules\Customer\Services\NotificationService;
use Validator;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();

        $service = new NotificationService();
        $objects = $service->getListNotification($params);
        if ($request->input('debug', 0)) {
            dd($objects);
        }

        return view('customer::notification.index', ['objects' => $objects['data']]);
    }

    public function show(Request $request, $slug, $id)
    {
        $service = new NotificationService();
        $object = $service->getNotification($id);
        if ($request->input('debug', 0)) {
            dd($object);
        }

        return view('customer::notification.show', ['object' => $object['data']]);
    }

    public function resetCounter(Request $request)
    {
        $service = new NotificationService();
        $object = $service->resetCounterNotification();

        return response()->json($object);
    }

    public function destroy(Request $request){
        $id = $request->get('id');
        $service = new NotificationService();
        $object   = $service->deleteNotification($id);
        return response()->json([
            'status' => $object?1:0
        ]);
    }

    public function register(Request $request) {

        $params = $request->all();
        $rules = [
            'token'     => 'required',
        ];

        $messages = [
            'token.required'     => 'Nhập token',
        ];

        $valid = Validator::make($params, $rules, $messages);

        if ($valid->fails())
        {
            return response()->json([
                'rs' => 0,
                'msg' => 'Dữ liệu nhập không hợp lệ',
                'errors' => $valid->errors()->messages(),
                'params' => $params
            ]);
        }

        $content = Auth::request_api('notification/customer-register', $params, 'post');

        if(isset($content['status']) && $content['status'] == 'success'){
            \App\Helpers\Notification::setToken($content['data']['customer_token_id']);

            return response()->json([
                'rs'        => 1,
                'msg'       => 'Đăng ký thành công',
                'content'   => $content['data']
            ]);

        }

        return response()->json([
            'rs'        => 0,
            'msg'       => 'Đăng ký không thành công',
            'content'   => $content
        ]);
    }
}
