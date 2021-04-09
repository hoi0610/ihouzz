<?php
namespace Modules\Customer\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Request;
use Validator;
use Redirect;

class PasswordController extends Controller
{
    protected $data  = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    public function otp(Request $request)
    {
        $this->data['phone'] = session('phone', false);
        if (!$this->data['phone']) {
            return redirect()->route('password.forget');
        }

        if ($request->isMethod('post')) {
            $params = $request->all();

            $rules = [
                'otp'    => 'required'
            ];

            $messages = [];

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

            $data = $valid->valid();
            $data['otp']    = implode("", $data['otp']);
            $data['phone']  = session('phone');

            $service = new BaseService();
            $response = $service->requestApi('customer/password/otp', $data, 'POST');

            if (isset($response['status']) && $response['status']==CODE_SUCCESS) {
                session(['token' => $response['data']['token']]);
                $result = [
                    'rs'     => 1,
                    'msg'    => __($response['message']),
                    'url'    => route('password.reset-via-phone')
                ];

                return response()->json($result);
            }

            return response()->json([
                'rs'        => 0,
                'errors'    => $response['errors']??'',
                'msg'       => __($response['message']??'')
            ]);
        }

        return view("customer::password.otp", $this->data);
    }

    public function resetViaPhone(Request $request) {
        $token = $request->input('id-token', false);
        if ($token) {
            $type   = 'firebase';
        } else {
            $type   = 'phone';
            $token  = session('token');
        }

        if(!$token) {
            // chuyen ve trang nhap phone
        }

        if ($request->isMethod('post')) {
            $params = $request->all();

            $rules = [
                'password'              => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
                'password_confirmation' => 'required',
            ];

            $messages = [
                'password.required'     => 'Nhập Mật khẩu mới',
                'password.min'          => 'Mật khẩu quá ngắn',
                'password.confirmed'    => 'Mật khẩu không trùng khớp',
                'password_confirmation.required'    => 'Nhập lại mật khẩu',
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

            $data = $valid->valid();
            $service = new BaseService();
            if ($type=='phone') {
                $data['token'] = session('token');
                $data['phone'] = session('phone');
                $response = $service->requestApi('customer/password/reset-via-phone', $data, 'POST');
            } else {
                $data['token'] = $token;
                $response = $service->requestApi('customer/password/reset-via-firebase', $data, 'POST');
            }

            if (isset($response['status']) && $response['status']==CODE_SUCCESS) {
                $result = [
                    'rs'     => 1,
                    'msg'    => __($response['message']),
                ];
                return response()->json($result);
            }

            return response()->json([
                'rs'        => 0,
                'errors'    => $response['errors'],
                'msg'       => __($response['message'])
            ]);
        }

        return view("customer::password.reset-via-phone", $this->data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forget(Request $request)
    {
        if ($request->isMethod('post')) {
            $params = $request->all();

            $rules = [
//                'email'    => 'required|email'
                'phone'    => 'required'
            ];

            $messages = [
                'email.required'    => 'Nhập Email',
                'email.email'       => 'Email không đúng định dạng'
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

            $data = $valid->valid();

            $service = new BaseService();
//            $response = $service->requestApi('customer/password/email', $data, 'POST');
            $response = $service->requestApi('customer/password/phone', $data, 'POST');

            if (isset($response['status']) && $response['status']==CODE_SUCCESS) {
                $result = [
                    'rs'     => 1,
                    'msg'    => __($response['message']),
                ];
                if (isset($response['data']['type']) && $response['data']['type']=="phone") {
                    session(['phone' => $data['phone']]);
                    $result['url'] = route('password.otp');
                }
                return response()->json($result);
            }

            return response()->json([
                'rs'        => 0,
                'errors'    => $response['errors']??'',
                'msg'       => __($response['message']??'')
            ]);
        }

//        return view("customer::password.forget", $this->data);
        return view("customer::password.forget-firebase", $this->data);
    }

    public function resendOtp(Request $request) {
        $resend_otp = session('resend_otp', 0);
        if ($resend_otp >= 3) {
            return response()->json([
                'rs'        => 0,
                'msg'       => __('passwords.max_resend')
            ]);
        }

        $data['phone'] = session('phone', false);
        if (!$data['phone']) {
            return response()->json([
                'rs'        => 0,
                'errors'    => 'not found phone',
                'msg'       => __('passwords.not_found_phone')
            ]);
        }

        $service = new BaseService();
        $response = $service->requestApi('customer/password/phone', $data, 'POST');

        if (isset($response['status']) && $response['status']==CODE_SUCCESS) {
            $result = [
                'rs'     => 1,
                'msg'    => __($response['message']),
            ];

            session(['resend_otp' => $resend_otp+1]);

            return response()->json($result);
        }

        return response()->json([
            'rs'        => 0,
            'errors'    => $response['errors']??'',
            'msg'       => __($response['message']??'')
        ]);
    }

    public function reset(Request $request, $token) {

        if ($request->isMethod('post')) {
            $params = $request->all();

            $rules = [
                'email'                 => 'required|email',
                'password'              => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
                'password_confirmation' => 'required',
            ];

            $messages = [
                'email.required'        => 'Nhập Email',
                'email.email'           => 'Email không đúng',
                'password.required'     => 'Nhập Mật khẩu mới',
                'password.min'          => 'Mật khẩu quá ngắn',
                'password.confirmed'    => 'Mật khẩu không trùng khớp',
                'password_confirmation.required'    => 'Nhập lại mật khẩu',
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

            $data = $valid->valid();
            $data['token'] = $token;

            $service = new BaseService();
            $response = $service->requestApi('customer/password/reset', $data, 'POST');

            if (isset($response['status']) && $response['status']==CODE_SUCCESS) {
                $result = [
                    'rs'     => 1,
                    'msg'    => __($response['message']),
                ];
                return response()->json($result);
            }

            return response()->json([
                'rs'        => 0,
                'errors'    => $response['errors'],
                'msg'       => __($response['message'])
            ]);
        }

        return view("customer::password.reset", $this->data);
    }
}
