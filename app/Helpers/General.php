<?php
namespace App\Helpers;

use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Cache;

class General
{
    public static function telegram_log($content) {
        if (is_array($content)) $content = json_encode($content);
        //            $url = 'https://api.telegram.org/bot545339852:AAH9-wfIRfeWX19P7uPvrHPrGho57CuIunc/getUpdates'; dùng get chat id
        $url = 'https://api.telegram.org/bot545339852:AAH9-wfIRfeWX19P7uPvrHPrGho57CuIunc/sendMessage';
        $url .= '?chat_id='.config('app.telegram_id');
        $url .= '&text='. urlencode(env("APP_NAME")). ': '.$content;

        $res = Curl::to($url)->get();
    }

    public static function getOptionChildrenAges() {
        return  array(
            '2'         => '2 tuổi',
            '3'         => '3 tuổi',
            '4'         => '4 tuổi',
        );
    }

    public static function getOptionGender() {
        return  array(
            'male'       => 'Nam',
            'female'     => 'Nữ',
            'other'      => 'Khác',
        );
    }

    public static function getMenusAndGroup($position)
    {
        $objects = self::getMenuItemsByPosition($position);
        $tmp = [];
        foreach ($objects as $item) {
            $tmp[$item['parent_id']][] = $item;
        }

        return $tmp;
    }

    public static function getMenuItemsByPosition($position='main-nav', $re_cache=false) {
        $locale = config('app.locale');
        $key = 'MenuItems:Position:'.$position.':'.$locale;

        $objects = Cache::get( $key );

        if ($re_cache || !$objects) {
            $query = \App\Models\MenuItem::where('menu_items.position', '=', $position)
                ->leftjoin('pages as p','p.id', '=', 'menu_items.page_id')
                ->leftJoin('menu_items_locale', function($leftJoin) use ($locale)
                {
                    $leftJoin->on('menu_items_locale.menu_item_id', '=', 'menu_items.id')
                        ->where('menu_items_locale.locale', '=', $locale);
                })
                ->orderBy('ordering', 'asc');

            $objects = $query->get([
                'menu_items.*', 'menu_items_locale.name',
                'p.slug as page_slug'
            ])->toArray();

            foreach ($objects as $i => $item) {
                $objects[$i]['link_full'] = self::get_link_menu($item);
            }

            Cache::forever($key, $objects);
        }

        return $objects;
    }

    public static function get_link_menu($item, $locale='') {
        if ($item['type']=='page_link') {
            $tmp = $locale.'/'.$item['page_slug'];
        } elseif ($item['type']=='internal_link') {
            $tmp = $locale.$item['link'];
        } else {
            $tmp = $item['link'];
        }

        return url($tmp ? $tmp : '/');
    }

    public static function get_scripts_include($type='body', $re_cache=false) {
        $key = 'ScriptInclude:All';

        $objects = Cache::get( $key );

        if ($re_cache || !$objects) {
            $objects = \App\Models\ScriptInclude::getAllScripts();

            Cache::forever($key, $objects);
        }

        foreach ($objects as $item) {
            if (!isset($item['type']) || $item['type']===$type) echo $item['value'];
        }
    }

    public static function getAddress($ward_id,$address=''){
        $ward = \App\Models\Ward::select(
            \DB::raw("CONCAT_WS(' ', provinces.type, provinces.name) as province_name"),
            \DB::raw("CONCAT_WS(' ', districts.type, districts.name) as district_name"),
            \DB::raw("CONCAT_WS(' ', wards.type, wards.name) as ward_name")
        )
            ->where('ward_id', $ward_id)
            ->leftJoin('districts', 'districts.district_id', '=', 'wards.district_id')
            ->leftJoin('provinces', 'provinces.province_id', '=', 'districts.province_id')
            ->first();
        $address = [$address];
        if ($ward['ward_name'] && strpos($address[0], $ward['ward_name']) === false) {
            $address[] = $ward['ward_name'];
        }
        if ($ward['district_name'] && strpos($address[0], $ward['district_name']) === false) {
            $address[] = $ward['district_name'];
        }
        if ($ward['province_name'] && strpos($address[0], $ward['province_name']) === false) {
            $address[] = $ward['province_name'];
        }
        $address = implode(", ", $address);
        return $address;
    }

    public static function get_settings($name=null, $re_cache=false) {
        $key = 'Settings:All';

        $objects = Cache::get( $key );

        if ($re_cache || !$objects) {
            $objects = \App\Models\Setting::getAllSettings();

            Cache::forever($key, $objects);
        }

        if ($name) {
            return @$objects[$name];
        }

        return $objects;
    }

    static function get_version_js($re_cache=false) {
        $key = 'get_version_js';

        $value = Cache::get( $key );

        if ($re_cache || !$value) {
            $value = time();

            Cache::forever($key, $value);
        }

        return $value;
    }
    static function get_version_css($re_cache=false) {
        $key = 'get_version_css';

        $value = Cache::get( $key );

        if ($re_cache || !$value) {
            $value = time();

            Cache::forever($key, $value);
        }

        return $value;
    }

    public static function getControllerAction() {
        $action = app('request')->route()->getAction();

        $route = isset($action['as']) ? $action['as'] : '';
        $controller = class_basename($action['controller']);

        $controller = explode('@', $controller);

        return array(
            'controller' => $controller[0],
            'action' => $controller[1],
            'route_name' => $route,
            'as' => $route,
            'prefix' => $action['prefix'],
            'namespace' => $action['namespace'],
            'parameters' => app('request')->route()->parameters
        );
    }
}
