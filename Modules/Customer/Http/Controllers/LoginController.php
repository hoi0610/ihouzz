<?php
namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Redirect;
use Jenssegers\Agent\Agent;

class LoginController extends Controller
{
    protected $redirectTo = '/';

    protected $data  = []; // the information we send to the view
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->guard()->check()) {
            return redirect()->intended($this->redirectTo);
        }

        if ($request->isMethod('post')) {
            $params = $request->all();
            $rules = [
//                'email'    => 'required|email',
                'phone'    => 'required',
                'password' => 'required',
            ];

            $messages = [
                'phone.required'    => 'Nhập vào số điện thoại',
                'password.required' => 'Nhập mật khẩu',
//                'email.required'    => 'Nhập vào địa chỉ email',
//                'email.email'       => 'Email sai định dạng',
            ];

            $valid = Validator::make($params, $rules, $messages);

            if ($valid->fails())
            {
                return redirect()->back()
                    ->with('message', 'Dữ liệu nhập không hợp lệ')
                    ->withErrors($valid->errors()->messages());
            }

            $body = [
                'phone'     => $request->input('phone'),
                'password'  => $request->input('password'),
            ];

            $res = $this->guard()->attempt($body, $request->filled('remember'));

            if (isset($res['status']) && $res['status']=='success') {
                return redirect()->intended($this->redirectTo);
            }

            return redirect()->back()
                ->with('message', $res['message'] ?? 'Dữ liệu nhập không hợp lệ')
                ->withErrors($valid->errors()->messages());
        }

        $agent = new Agent();
        if ($agent->isDesktop()) {
            return view("customer::login.index", $this->data);
        }

        return view("customer::login.index-wap", $this->data);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        auth('jwt')->logout();

        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('jwt');
    }
}
