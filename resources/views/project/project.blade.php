@php $status = [
    1 => 'Chưa xác thực',
    2 => 'Đã xác thực',
    3 => 'Đang thương lượng',
    4 => 'Chờ đặt cọc',
    5 => 'Đã giao dịch',
    6 => 'Đã cho thuê',
    7 => 'Tạm ngưng'];
@endphp
@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    <livewire:form-search-category />
    @include('includes.option')
    <section class="list-project-poverty">
        <div class="container">
            <div class="top-header-title">
                <div class="left-title">
                    <h3 class="title-block">Dự án tại TP.Hồ Chí Minh</h3>
                    <p>Hiện có <b class="yellow">{{ $data['total'] }}</b> dự án</p>
                </div>
            </div>

            <div class="toolbar-wp">
                <div class="place-slide">
                    <ul class="list-place-slide">
                        @foreach($params['filters'] as $key => $value)
                            <li class="item">
                                @php $active = '';
                                    if(isset($params['filter']) && $key == $params['filter']){
                                        $active = 'active';
                                    }
                                @endphp
                                <a class="{{ $active }} filter" href="javascript:void(0)" data-name="filter" data-value="{{$key}}">{{$value}}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="toolbar-right">
                    <span class="display-sort">
                        Mặc định:
                        <img src="assets/images/icons/sort-down.png" alt="">
                    </span>
                    <span class="display-mode" id="myTab" role="tablist">
                        Hiển thị:
                        <a class="action-grid {{ isset($params['show']) ? ($params['show'] == 'grid-tab'
                            ? 'active' : '') : 'active' }}" title="Grid"
                           id="grid-tab" data-toggle="tab" role="tab" aria-controls="grid">
                            <i class="fas fa-th"></i>
                        </a>
                        <a class="action-list {{ isset($params['show']) ? ($params['show'] == 'list-tab'
                            ? 'active' : '') : '' }}" title="List"
                           id="list-tab" data-toggle="tab" role="tab" aria-controls="list">
                            <i class="fas fa-list-ul"></i>
                        </a>
                    </span>
                </div>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade {{ isset($params['show']) ? ($params['show'] == 'grid-tab' ? 'show' : '') : 'show' }}
                {{ isset($params['show']) ? ($params['show'] == 'grid-tab' ? 'active' : '') : 'active' }}" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                    <div class="main-content">
                        <div class="list-project-poverties">
                            <div class="row">
                                @foreach($data['data'] as $key => $item)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="project-item-wrapper">
                                            <a href="{{ route('du-an.detail', $item['id']) }}">
                                                <div class="wp-image-project"><img src="{{ $item['image_url'].$item['image'] }}" alt=""></div>
                                                <div class="content-info">
                                                    <strong class="name">{{ $item['name'] }}</strong>
                                                    <span class="place"><i class="fas fa-map-marker-alt"></i> {{ $item['district_name'] }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <x-paginator-custom :data="$data"/>
                    </div>
                </div>
                <div class="tab-pane fade {{ isset($params['show']) ? ($params['show'] == 'list-tab' ? 'show' : '') : 'show' }}
                {{ isset($params['show']) ? ($params['show'] == 'list-tab' ? 'active' : '') : '' }}" id="list" role="tabpanel" aria-labelledby="list-tab">
                    <div class="main-content">
                        <div class="list-project-poverties">
                            @foreach($data['data'] as $key => $item)
                                <div class="row">
                                <div class="col-md-9">
                                    <div class="project-item-horizontal project-item">
                                        <div class="media-block">
                                            <div class="show-img-large">
                                                <div class="slider-for-pj">
                                                    <div class="item"><img src="{{ $item['image_url'].$item['image'] }}" alt=""></div>
                                                </div>
                                                <div class="gallery">
                                                    <img src="/html/assets/images/icons/gallery.png" alt="">
                                                    <span>15</span>
                                                </div>
                                            </div>
                                            <div class="slider-nav-pj">
                                                @foreach($item['image_details'] as $img)
                                                <div class="item"><img src="{{ $img['image_url'].$img['image'] }}" alt=""></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="content-info-block">
                                            <a href="{{ route('du-an.detail', $item['id']) }}" class="name">{{ $item['name'] }}</a>
                                            <div class="location"><i class="fas fa-map-marker-alt blue"></i>
                                                @php $address = [];
                                                    if (isset($item['street'])) {
                                                        array_push($address, $item['street']['name']);
                                                    }
                                                    if (isset($item['ward_name'])) {
                                                        array_push($address, $item['ward_name']);
                                                    }
                                                    if (isset($item['district_name'])) {
                                                        array_push($address, $item['district_name']);
                                                    }
                                                    if (isset($item['province_name'])) {
                                                        array_push($address, $item['province_name']);
                                                    }
                                                @endphp
                                                {!! implode(", ", $address) !!} </div>
                                            <div class="line-bottom">
                                                <div class="show-info">
                                                    <span class=" icon">
                                                        <img src="/html/assets/images/icons/business-and-trade.png" alt="">
                                                        {{ $item['building'] ?? 0 }} Block
                                                    </span>
                                                                                        <span class="icon ">
                                                        <img src="/html/assets/images/icons/assembly-area.png" alt="">
                                                        {{ $item['apartment'] ?? 0 }} căn hộ
                                                    </span>
                                                                                        <span class="icon">
                                                        <img src="/html/assets/images/icons/dollar.png" alt="">
                                                        {{ $item['price_square_meters'] ?? 0 }}/m2
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="short-content">
                                                {!! $item['description'] ?? '' !!}
                                            </div>
                                            <div class="info-bottom">
                                                <p><b>Chủ đầu tư:</b> {{ $item['investor_name'] ?? '' }}</p>
                                                <p><b>Tình trạng:</b> {{ $status[$item['status']] ?? '' }}</p>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3 no-padding-left">
                                    <x-form-register-advisory-and-home-view :productId="null" :projectId="$item['id']" />
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <x-paginator-custom :data="$data"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            @if(session('success_message'))
                <input class="modal-btn" type="checkbox" id="modal-btn" name="modal-btn"/>
                <label for="modal-btn"></label>
                <div class="modal">
                    <div class="modal-wrap">
                        <h3 style="color: green; font-weight: bold; padding: 10px 20px">Chúc mừng!</h3>
                        <hr>
                        <p>{{ session('success_message') }}</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('after_styles')
    <style>
        .section{
            position: relative;
            width: 100%;
            display: block;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .full-height{
            min-height: 100vh;
        }

        [type="checkbox"]:checked,
        [type="checkbox"]:not(:checked){
            position: absolute;
            left: -9999px;
        }
        .modal-btn:checked + label,
        .modal-btn:not(:checked) + label{
            position: relative;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 15px;
            line-height: 2;
            transition: all 200ms linear;
            border-radius: 4px;
            letter-spacing: 1px;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -moz-align-items: center;
            -ms-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            -moz-justify-content: center;
            -ms-justify-content: center;
            justify-content: center;
            -ms-flex-pack: center;
            text-align: center;
            -ms-flex-item-align: center;
            align-self: center;
            border: none;
            cursor: pointer;
            background-color: #102770;
            color: #ffeba7;
            box-shadow: 0 12px 35px 0 rgba(16,39,112,.25);
        }
        .modal-btn:not(:checked) + label:hover{
            background-color: #ffeba7;
            color: #102770;
        }
        .modal-btn:checked + label .uil,
        .modal-btn:not(:checked) + label .uil{
            margin-left: 10px;
            font-size: 18px;
        }
        .modal-btn:checked + label:after,
        .modal-btn:not(:checked) + label:after{
            position: fixed;
            top: 100px;
            right: 30px;
            z-index: 110;
            width: 40px;
            border-radius: 3px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-size: 18px;
            background-color: #ffeba7;
            color: #102770;
            content: 'x';
            box-shadow: 0 12px 25px 0 rgba(16,39,112,.25);
            transition: all 200ms linear;
            opacity: 1;
            pointer-events: auto;
            transform: translateY(20px);
        }
        .modal-btn:checked + label:hover:after,
        .modal-btn:not(:checked) + label:hover:after{
            background-color: #102770;
            color: #ffeba7;
        }
        .modal-btn:checked + label:after{
            transition: opacity 300ms 300ms ease, transform 300ms 300ms ease, background-color 250ms linear, color 250ms linear;
            display: none;
            pointer-events: auto;
            transform: translateY(0);
        }
        .modal{
            position: fixed;
            display: block;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
            margin: 0 auto;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            overflow-x: hidden;
            background-color: rgba(31,32,41,.75);
            pointer-events: none;
            opacity: 1;
            transition: opacity 250ms 700ms ease;
        }
        .modal-btn:checked ~ .modal{
            pointer-events: auto;
            display: none;
            transition: all 300ms ease-in-out;
        }
        .modal-wrap {
            position: relative;
            display: block;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 4px;
            overflow: hidden;
            padding-bottom: 20px;
            background-color: #fff;
            -ms-flex-item-align: center;
            align-self: center;
            box-shadow: 0 12px 25px 0 rgba(199,175,189,.25);
            opacity: 1;
            transform: scale(1);
            transition: opacity 250ms 250ms ease, transform 300ms 250ms ease;
        }
        .modal-wrap img {
            display: block;
            width: 100%;
            height: auto;
        }
        .modal-wrap p {
            padding: 20px 30px 0 30px;
        }
        .modal-btn:checked ~ .modal .modal-wrap{
            opacity: 1;
            transform: scale(1);
            transition: opacity 250ms 500ms ease, transform 350ms 500ms ease;
        }


        .logo {
            position: absolute;
            top: 25px;
            left: 25px;
            display: block;
            z-index: 1000;
            transition: all 250ms linear;
        }
        .logo img {
            height: 26px;
            width: auto;
            display: block;
            filter: brightness(10%);
            transition: filter 250ms 700ms linear;
        }
        .modal-btn:checked ~ .logo img {
            filter: brightness(100%);
            transition: all 250ms linear;
        }


        @media screen and (max-width: 500px) {
            .modal-wrap {
                width: calc(100% - 40px);
                padding-bottom: 15px;
            }
            .modal-wrap p {
                padding: 15px 20px 0 20px;
            }
        }
    </style>
@endsection

@section('after_scripts')
    <script>
        $('#grid-tab').on('click',function(){
            $(this).addClass('active');
            $('#list-tab').removeClass('active');
            let href = replaceQueryParam('show', 'grid-tab', window.location.href);
            window.location.href = href;
        });

        $('#list-tab').on('click',function(){
            $(this).addClass('active');
            $('#grid-tab').removeClass('active');
            let href = replaceQueryParam('show', 'list-tab', window.location.href);
            window.location.href = href;
        });

        $('.filter').on('click',function(){
            let url = window.location.href;
            url = normalizeAmpersand(url);

            url = URI(url);
            if (url.hasQuery('filter')) {
                url.removeQuery('filter');
            }
            let href = url.toString();
            if ($(this).data('value') !== 'all') {
                href = updateUrlParameter($(this).data('name'),$(this).data('value'), href);
            }

            //check show tab or list
            let activeTab = $("#myTab").find(".active");
            let id = activeTab.attr('id');
            href = updateUrlParameter('show', id , href);

            window.location.href = href;
        })
    </script>
@endsection
