<?php

namespace Modules\Customer\Http\Controllers;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Validator;

class RegisterController extends Controller
{
    public function index(Request $request){

        if ($request->isMethod('post')) {
            $params = $request->all();
            $rules = [
                'name'     => 'required',
                'email'    => 'required|email',
                'phone'    => 'required',
                'password'    => 'required|min:6',
                're-password'    => 'same:password',
            ];

            $messages = [
                'name.required'     => 'Nhập họ tên',
                'phone.required'    => 'Nhập số điện thoại',
                'email.required'    => 'Nhập địa chỉ email',
                'email.email'       => 'Email không đúng định dạng',
                'password.required' => 'Nhập mật khẩu',
                're-password.same'  => 'Mật khẩu không trùng khớp',
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

            $action = config('app.api_url').'auth/register';

            $response = \Curl::to($action)
                ->withData( $params )
                ->withResponseHeaders()
                ->returnResponseObject()
                ->post();

            $content = json_decode($response->content, 1);

            if ($response->status==200) {
                auth('jwt')->loginWithUserToken($content['data']);

                return response()->json([
                    'rs'        => 1,
                    'msg'       => 'Cảm ơn quí khách hàng đã đăng ký tài khoản ở :app_name <br>Mời quí khách chọn đồng ý để tiếp tục đặt dịch vụ.',
                ]);
            }

            if ($content) {
                $content['rs'] = 0;
                $content['msg'] = 'Đăng ký không thành công';
                return response()->json($content);
            }

            return response()->json([
                'rs'        => 0,
                'msg'       => 'Đăng ký không thành công',
                'content'   => $response->content,
            ]);
        }

        $agent = new Agent();
        if ($agent->isDesktop()) {
            return view('customer::register.index');
        }

        return view('customer::register.index-wap');
    }

    public function otpValidatePhoneNumber() {
        return view('customer::register.otp-validate-phone-number-wap');
    }
}
