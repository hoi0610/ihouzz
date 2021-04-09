@php
    $expiresAt = \Carbon\Carbon::now()->addMinutes(10);
    //if(!\Illuminate\Support\Facades\Cache::has('footer')) {
       // $footerApi = \App\Facade\ApiSetting::listMenuItem(['position' => 'footer', 'locale' => 'vi', 're_cache' => 1]);
        //if(isset($footerApi) && !is_null($footerApi) && isset($footerApi['data']) && !is_null($footerApi['data'])) {
          //  \Illuminate\Support\Facades\Cache::add('footer', $footerApi['data'], $expiresAt);
        //} else {
        //    \Illuminate\Support\Facades\Cache::add('footer', [], $expiresAt);
        //}
    //}
    //$footer = \Illuminate\Support\Facades\Cache::get('footer');
    $footerApi = \App\Facade\ApiSetting::listMenuItem(['position' => 'footer', 'locale' => 'vi', 're_cache' => 1]);
    if(isset($footerApi) && !is_null($footerApi) && isset($footerApi['data']) && !is_null($footerApi['data'])) {
        $footer = $footerApi['data'];
    } else {
        $footer = [];
    }
    $footer_parent = collect($footer)->filter(function ($item, $key) {
        return $item['parent_id'] == 0;
    });
    $footer_child = collect($footer)->filter(function ($item, $key) {
        return $item['parent_id'] != 0;
    });
    $parent_id = collect($footer_child)->pluck('parent_id')->all();
@endphp
<footer>
    <div class="container">
        <div class="top-footer">
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="logo"><img src="/html/assets/images/logo.png" alt=""></a>
                    <ul class="list-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span class="text">
                                B607, Tầng 6, Tòa nhà Cinotec, 282 Lê Quang Định, Phường 11, Quận Bình   Thạnh, Thành phố Hồ Chí Minh, Việt Nam
                            </span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span class="text">hello@ihouzz.vn</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-volume"></i>
                            <span class="text"><strong>1900277211</strong> (1.000đ/phút)</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @if(!empty($footer_parent))
                            @foreach($footer_parent as $item)
                                <div class="col-md-3">
                                    <strong class="title-block">{{ $item['name'] ?? '' }}</strong>
                                    @if(in_array($item['id'], $parent_id))
                                        <ul class="list-link">
                                            @foreach($footer_child as $item2)
                                                @if($item['id'] == $item2['parent_id'])
                                                    <li><a href="{{ url($item2['link']) }}">{{ $item2['name'] ?? '' }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="middle-footer">
            <div class="get-down">
                <strong class="title">Tải app ngay</strong>
                <ul class="list-down">
                    <li><a href="#"><img src="/html/assets/images/app-store.png" alt=""></a></li>
                    <li><a href="#"><img src="/html/assets/images/ggplay.png" alt=""></a></li>
                </ul>
            </div>
            <img class="registed" src="/html/assets/images/registed.png" alt="">
            <div class="register-footer-form">
                <strong class="title">Đăng ký nhận thông tin mới nhất về thị trường bất động sản</strong>
                <div class="input-group">
                    <input type="text" placeholder="Nhập email để nhận thông tin" class="form-control" value="">
                    <span class="input-group-btn">
                        <button class="btn btn-mint" type="button">Gửi</button>
                    </span>
                </div>
            </div>
            <div class="row-social">
                <strong class="title">Kết nối với iHouzz</strong>
                <ul class="list-social">
                    <li><a href="#"><img src="/html/assets/images/fb.png" alt=""></a></li>
                    <li><a href="#"><img src="/html/assets/images/gg.png" alt=""></a></li>
                    <li><a href="#"><img src="/html/assets/images/twt.png" alt=""></a></li>
                    <li><a href="#"><img src="/html/assets/images/ytb.png" alt=""></a></li>
                </ul>
            </div>
        </div>

        <div class="bottom-footer text-center">
            <p>Copyright 2020. iHouzz</p>
        </div>
    </div>

    <button class="back-top-btn"><span></span></button>
</footer>
