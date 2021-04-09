<?php

namespace App\Http\Controllers;

use App\Facade\ApiSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function register()
    {
        if(!empty(\App\Helpers\Api::getUserInfo())) {
            return redirect()->route('home.index');
        } else {
            return view('auth.register');
        }

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        if(!empty(\App\Helpers\Api::getUserInfo())) {
            return redirect()->route('home.index');
        } else {
            return view('auth.login');
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginSave(Request $request)
    {
        $this->validateLogin($request);

        $body = [
            'phone'     => $request->input('phone'),
            'password'  => $request->input('password'),
        ];
        $type = $request->type;

        $res = $this->guard()->attempt($body, $type, $request->filled('remember'));

        if (isset($res['status']) && $res['status']=='success') {
            return redirect()->intended('/');
        }

        return redirect()->back()
            ->with('message', $res['message'] ?? 'Dữ liệu nhập không hợp lệ')
            ->withErrors('Không thể login');
    }
    public function loginAgent(Request $request)
    {
        $request->validate([
            'agent_phone' => 'required|string',
            'agent_password' => 'required|string'
        ]);
        $body = [
            'phone'     => $request->input('agent_phone'),
            'password'  => $request->input('agent_password'),
        ];
        $type = $request->type;

        $res = $this->guard()->attempt($body, $type, $request->filled('remember'));

        if (isset($res['status']) && $res['status']=='success') {
            return redirect()->intended('/');
        }

        return redirect()->back()
            ->with('message_agent', $res['message'] ?? 'Dữ liệu nhập không hợp lệ')
            ->withErrors('Không thể login');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('jwt');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'phone';
    }
}
