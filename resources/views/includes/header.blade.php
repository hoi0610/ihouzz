<?php
use Carbon\Carbon;
$customer = auth('jwt')->user();
$expiresAt = Carbon::now()->addMinutes(10);
//if(!\Illuminate\Support\Facades\Cache::has('nav_main')) {
//    $main_navApi = \App\Facade\ApiSetting::listMenuItem(['position' => 'main-nav', 'locale' => 'vi', 're_cache' => 1]);
//    if(isset($main_navApi) && !is_null($main_navApi) && isset($main_navApi['data']) && !is_null($main_navApi['data'])) {
//        \Illuminate\Support\Facades\Cache::add('nav_main', $main_navApi['data'], $expiresAt);
//    } else {
//        \Illuminate\Support\Facades\Cache::add('nav_main', [], $expiresAt);
//    }
//}
//
//$main_nav = \Illuminate\Support\Facades\Cache::get('nav_main');
$main_navApi = \App\Facade\ApiSetting::listMenuItem(['position' => 'main-nav', 'locale' => 'vi', 're_cache' => 1]);
if(isset($main_navApi) && !is_null($main_navApi) && isset($main_navApi['data']) && !is_null($main_navApi['data'])) {
    $main_nav = $main_navApi['data'];
} else {
    $main_nav = [];
}

$main_nav_no_parent = collect($main_nav)->filter(function ($item) {
    return $item['parent_id'] == 0;
});
$main_nav_has_parent = collect($main_nav)->filter(function ($item, $key) {
    return $item['parent_id'] != 0;
});
$parent_id = collect($main_nav_has_parent)->pluck('parent_id')->all();

//if(!\Illuminate\Support\Facades\Cache::has('customer_main_nav')) {
//    $customer_main_navApi = \App\Facade\ApiSetting::listMenuItem(['position' => 'customer-main-nav', 'locale' => 'vi', 're_cache' => 1]);
//    if(isset($customer_main_navApi) && !is_null($customer_main_navApi) && isset($customer_main_navApi['data']) && !is_null($customer_main_navApi['data'])) {
//        \Illuminate\Support\Facades\Cache::add('customer_main_nav', $customer_main_navApi['data'], $expiresAt);
//    } else {
//        \Illuminate\Support\Facades\Cache::add('customer_main_nav', [], $expiresAt);
//    }
//}
//$customer_main_nav = \Illuminate\Support\Facades\Cache::get('customer_main_nav');

$customer_main_navApi = \App\Facade\ApiSetting::listMenuItem(['position' => 'customer-main-nav', 'locale' => 'vi', 're_cache' => 1]);
if(isset($customer_main_navApi) && !is_null($customer_main_navApi) && isset($customer_main_navApi['data']) && !is_null($customer_main_navApi['data'])) {
    $customer_main_nav = $customer_main_navApi['data'];
} else {
    $customer_main_nav = [];
}

?>
<header class="c-site-head | js-site-head js-smooth-section">
    <div class="c-site-head__inner o-row o-row--expanded">
        <div class="container">
            <div class="logo-wp">
                <a href="/" class="logo"><img src="/html/assets/images/logo-top.png" alt=""></a>
                <a href="/" class="logo-regular"><img src="/html/assets/images/logo.png" alt=""></a>
            </div>
            <div class="right-block-header c-site-head__menu">
                <div class="bottom-header">
                    <ul class="nav top-right-header navbar-right pull-right">
                        @if(!empty($main_nav))
                            @foreach($main_nav_no_parent as $item)
                                <li class="@if(in_array($item['id'], $parent_id)) has-dropdown @endif">
                                    <a href="{{ url($item['link']) }}">{{ $item['name'] ?? '' }}</a>
                                    @if(!empty(collect($main_nav_has_parent)->all()) && in_array($item['id'], $parent_id))
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @foreach($main_nav_has_parent as $item2)
                                                @if($item2['parent_id'] == $item['id'])
                                                    <a class="dropdown-item " href="{{ url($item2['link']) }}">{{ $item2['name'] ?? '' }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        @endif

                        @if ($customer)
                            <li class="has-dropdown ">
                                <a href="#" data-toggle="dropdown">
                                    <?php
                                    $avatar = isset($customer['avatar']) && $customer['avatar'] ? url($customer['avatar_url'].$customer['avatar']) : "/html/assets/images/icons/user-profile.png";
                                    ?>
                                    <img src="{{$avatar}}" alt="">
                                    Chào, {{$customer['name']}}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @if(!empty($customer_main_nav))
                                        @foreach($customer_main_nav as $menu)
                                            <a class="dropdown-item" href="{{ url($menu['link']) }}">{!! $menu['name'] ?? '' !!}</a>
                                        @endforeach
                                    @endif
                                    <a class="dropdown-item" href="{!! route('logout') !!}" onclick="return logout(this)">Đăng xuất</a>
                                </div>
                            </li>
                        @else
                            <li>
                                <a href="{{route('login')}}" class="btn login-action">
                                    <img src="/html/assets/images/icons/user-profile.png" alt="">Đăng nhập</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <button class="menu-btn nav-open" type="button">
        <span></span>
        <span></span>
        <span></span>
    </button>

</header>
