<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider) {
        $userInfo = Socialite::driver($provider)->user();
        $params = [
            'name' => $userInfo->name,
            'email' => $userInfo->email,
            'provider' => $provider,
            'provider_id' => $userInfo->id
        ];
        $res = $this->guard()->attempt($params, 'social');

        if (isset($res['status']) && $res['status']=='success') {
            return redirect()->intended('/');
        }

        return redirect()->back()
            ->withErrors('Không thể login');
    }

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('jwt');
    }
}
