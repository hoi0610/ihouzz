<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Curl;

class Api
{
    public static function generateJWT(array $data=[]) {
        // Create token header as a JSON string
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

        // Create token payload as a JSON string
        $payload = json_encode($data);

        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, JWT_KEY, true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        // Create JWT
        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }
    public static function request_api_admin($action, $params=[], $method='get') {
        $action = config('app.api_admin_url')  . $action;
//        dump($action,$params,self::getToken());
        $request_api = Curl::to($action)
            ->withHeader('Authorization: Bearer '.self::getToken())
            ->withData($params)
            ->withResponseHeaders()
            ->returnResponseObject();

        $response = $request_api->$method();

        if (isset($response->status)) {
            if ($response->status==401) {
                $request = app('request');

                auth('jwt')->guard()->logout();
                $request->session()->invalidate();

                $response->href_login = route('login.index');

                if($request->ajax()) {
                    die(json_encode($response));
                }

                header('Location: '.$response->href_login);
                exit();
            } elseif ($response->status==404) {
                return ['status' => 0, 'message' => 'Not found api: '. $action];
            }
        }

        $content = json_decode($response->content, 1);
\Log::info($content);
        return $content ? $content : (array)$response;
    }
    public static function request_api($action, $params=[], $method='get', $files=[]) {
        $action = config('app.api_url')  . $action;
//        dump($action,$params,self::getToken());
        $request_api = Curl::to($action)
            ->withHeader('Authorization: Bearer '.self::getToken())
            ->withData($params)
            ->withResponseHeaders()
            ->returnResponseObject();

        foreach ($files as $key => $file) {
//            \Log::info($key, $file);
            $request_api->withFile($key, $file['tmp_name'], $file['tmp_name'], $file['name']);
        }

        $response = $request_api->$method();

        if (isset($response->status)) {
            if ($response->status==401) {
                $request = app('request');

                auth('jwt')->logout();
                $request->session()->invalidate();

                $response->href_login = route('login.index');

                if($request->ajax()) {
                    die(json_encode($response));
                }

                header('Location: '.$response->href_login);
                exit();
            } elseif ($response->status==404) {
                return ['status' => 0, 'message' => 'Not found api: '. $action];
            }
        }

        $content = json_decode($response->content, 1);

        return $content ? $content : (array)$response;
    }

    public static function keyGetPermissionsByUser($user_id) {
        return 'permissions:user:'.$user_id;
    }

    public static function forget_permissions() {
        return self::forget_prefix('permissions:user:*');
    }

    public static function get_permissions($user=false, $re_cache=false) {
        if (!$user) $user = self::getUserInfo();

        $key = self::keyGetPermissionsByUser($user['id']);

        $permissions = Cache::get($key);

        if (!$re_cache && $permissions) return $permissions;

        $res = self::request_api('user/get-permissions');

        $permissions = isset($res['status']) && $res['status'] == CODE_SUCCESS ? $res['data'] : [];

        if ($permissions) Cache::forever($key, $permissions);

        return $permissions;
    }

    public static function has_permission($route_name, $user=false, $permissions=false, $debug=false) {
        if ($user===false) $user = self::getUserInfo();

        // neu la nguoi thi có toan quyen
        if (self::is_admin($user)===1) return true;

        $roles = explode(",", @$user['role_ids']);

        if (in_array(1, $roles)) {
            return true;
        }

        // thuc hien call tu api va cache lai
        if ($permissions===false) {
            $permissions = self::get_permissions($user);
        }

        if (!$permissions) return true;

        if (is_array($route_name)) {
            foreach ($route_name as $rn) {
                if(!array_key_exists($rn, $permissions) || $permissions[$rn]) return true;
            }

            return false;
        }

        return !array_key_exists($route_name, $permissions) || $permissions[$route_name];
    }

    public static function is_admin($user=false) {
        if ($user===false) $user = self::getUserInfo();

        if ($user['id']==1) return 1; // người

        if (!$user['is_admin']) return 0; // người dùng bình thường của công ty

        return 2; // admin của 1 công ty
    }

    public static function id($value=false) {
        return auth('jwt')->id();
    }

    public static function getUserInfo() {
        return auth('jwt')->user();
    }

    public static function forget_prefix($prefix_key)
    {
        return Cache::flush();

        if ($prefix_key=="*") return;

        if (config('cache.default') == 'redis') {
            $redis = Cache::getRedis();
            $keys = $redis->keys($prefix_key);
            $count = 0;
            foreach ($keys as $key) {
                $redis->del($key);
                $count++;
            }
            return $count;
        } else {
            Cache::flush();
        }

        return 1;
    }

    public static function user($user=false, $expires_in=3600) {
        $key = self::keyCacheUserInfo();

        if (!$key) return false;

        if ($user===false) {
            return session($key);
        }

        return session([$key => $user]);
    }

    public static function keyCacheUserInfo() {
        if (self::id()) {
            return '_user_info:'.self::id();
        }

        return '';
    }

    public static function keyToken(){
        return 'jwt_token';
    }

    public static function setToken($token){
        return session([self::keyToken() => $token]);
    }

    public static function getToken(){
        return auth('jwt')->token();
    }

    public static function forgetToken(){
        $rs = session()->forget(self::keyToken());
        Session::save();
    }

    public static function checkResponseApi($request, $response) {
        if (isset($response->status) && $response->status==401) {
            auth('jwt')->guard()->logout();
            $request->session()->invalidate();

            $response->href_login = route('login.index');

            if($request->ajax()) {
                die(json_encode($response));
            }

            header('Location: '.$response->href_login);
            exit();
        }

        return $response;
    }

    public static function keyAuthGoogle2fa() {
        return '2fa:user';
    }

    public static function isAuthGoogle2fa() {
        $key = self::keyAuthGoogle2fa();
        return session($key);
    }

    public static function setAuthGoogle2fa($flag=1) {
        $key = self::keyAuthGoogle2fa();

        return session([$key => $flag]);
    }
}
