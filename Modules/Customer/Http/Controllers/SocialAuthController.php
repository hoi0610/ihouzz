<?php
namespace Modules\Customer\Http\Controllers;

use Socialite;
use App\Helpers\Api;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $data = [
            'provider' => $provider,
            'provider_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];
//        \App\Helpers\General::telegram_log($data);
        $res = Api::request_api('auth/social', $data, 'post');
//        \App\Helpers\General::telegram_log($res);
        if ($res['status']=='success') {
            auth('jwt')->loginWithUserToken($res['data']);

            return redirect()->route('booking.index');
        }

        return redirect()->route('login.index');
    }
}
