<?php
namespace App\Services;

use App\Helpers\Api;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiRequestService extends BaseService
{

    /**
     * @param $url
     * @param $param
     * @return \Illuminate\Http\Client\Response
     *
     * get api
     */
    public function get($url, $param)
    {
        $response = Http::get($url, $param);

        $data = !is_null(json_decode($response->body(), true)) ?
        json_decode($response->body(), true) : [];

        return $data;
    }

    /**
     * @param $url
     * @param $param
     * @return mixed
     *
     * post api
     */
    public function post($url, $param)
    {
        $response = Http::post($url, $param);

        $data = !is_null(json_decode($response->body(), true)) ?
            json_decode($response->body(), true) : [];

        return $data;
    }

    /**
     * @param array $param
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postWithAuth($url, $param = [])
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . Api::getToken(),
                'Accept' => 'application/json',
            ],
            'form_params' => $param
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $param
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWithAuth($url, $param = [])
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . Api::getToken(),
                'Accept' => 'application/json',
            ],
            'form_params' => $param
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $param
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function putWithAuth($url, $param = [])
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . Api::getToken(),
                'Accept' => 'application/json',
            ],
            'form_params' => $param
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $url
     * @param $param
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     *
     */
    public function postWithFile($url, $param, $arrayFile)
    {
        $response = new Http();
        if(count($arrayFile) > 0) {
            foreach ($arrayFile as $key =>  $file) {
                if($key == 0) {

                    $response = Http::attach(
                        $file[0], $file[1]
                    );
                } else {
                    $response = $response->attach(
                        $file[0], $file[1]
                    );
                }
            }
        }

        $response = $response->post($url, $param);

        return json_decode($response->body(), true);
    }

    /**
     * @param $url
     * @param array $param
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * post with form data
     */
    public function postWithFormData($url, $param = [])
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', $url, [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'form_params' => $param
        ]);

        return json_decode($response->getBody(), true);
    }

}
