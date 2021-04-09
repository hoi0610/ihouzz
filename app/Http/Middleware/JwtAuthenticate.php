<?php

namespace App\Http\Middleware;

use App\Helpers\Api;
use Closure;

class JwtAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!auth('jwt')->check()) {

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['status' => 'Unauthorized'], 401);
            } else {
                return redirect()->route('login');
            }
        }

//        return $next($request);

        // khoa dong nay la mo xac thuc OTP
//        if (config('app.env') == 'local') return $next($request);

        // xác thưc Google Authenticator
        if(env('MFA_STATUS') == 1)
        {
            $is2fa = Api::isAuthGoogle2fa();
            if ($is2fa)
            {
                return $next($request);
            }

            return response(view('user::google2fa.index'));
        }

        return $next($request);
    }
}
