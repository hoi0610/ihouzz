<?php

namespace App\Services;

use Ixudra\Curl\Facades\Curl;

class BaseService
{
    public function requestApi($action, $params=[], $method='get') {
        $action = config('app.api_url')  . $action;
//        dump($action,$params,self::getToken());
        $request_api = Curl::to($action)
            ->withHeader('Authorization: Bearer '.$this->getToken())
            ->withData($params)
            ->withResponseHeaders()
            ->returnResponseObject();

        $response = $request_api->$method();

        if (isset($response->status)) {
            if ($response->status==401) {
                $request = app('request');

                auth('jwt')->logout();
                $request->session()->invalidate();

                $response->href_login = route('login');

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

    public function getToken() {
        return auth('jwt')->token();
    }
}
