@extends('layouts.master')

@section('content')
<div>
    <livewire:form-search-home-page />
    <!--section-->
    <section class="mark-point">
        <div class="container">
            <div class="list-point row">
                @if(!empty($data['data']['introduce']['items']))
                    @foreach($data['data']['introduce']['items'] as $key => $item)
                        <div class="col-md-4">
                            <a href="{{ $key == 0 ? route('valuation.all') : ($key == 1 ? route('quy-hoach') : route('goi-vay.index')) }}">
                                <div class="item">
                                    <img src="{{ $item['image_url'].$item['image_location'] }}" alt="">
                                    <div class="right-content" style="color: #1e1e1e">
                                        <strong class="title">{{ $item['title'] }}</strong>
                                        {!! $item['description'] !!}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--section slide banner-->
    <section class="slide-banner">
        <div class="container">
            <ul class="list-banner">
                @if(!empty($data['data']['banner']['items']))
                    @foreach($data['data']['banner']['items'] as $item)
                        <li class="item"><a href="{{ $item['link'] }}"><img src="{{ $item['image_url'].$item['image_location'] }}" alt=""></a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </section>
    <!--section hightlight projects-->
    <section class="hightlight-projects hightlight-bg">
        <div class="container">
            <div class="content-intro">
                <strong class="title-block">{{ $data['data']['project_hot']['title'] ?? '' }}</strong>
                <div class="text">{!! $data['data']['project_hot']['content'] ?? '' !!}</div>
                <a href="{{ route('du-an') }}" class="view-all">Xem tất cả ></a>
            </div>
            <ul class="list-hightlight-pj">
                @if(!empty($data['data']['project_hot']['items']))
                    @foreach($data['data']['project_hot']['items'] as $item)
                        <li class="item">
                            <a href="{{ $item['link'] }}">
                                <div class="wrapper-wp-img">
                                    <div class="wp-img">
                                        <div>
                                            <img src="{{ $item['image_url'].$item['image_location'] }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <span class="info">{!! $item['title'] !!}</span>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </section>
    <!-- end section -->

    <section class="block-projects">
        <div class="container">
            <h3 class="title-block">{{ $data['data']['apartment_sale']['name'] ?? '' }}</h3>
            <div class="place-slide">
                <ul class="list-place-slide slide-place-action">
                    <li class="item" data-filter="all"><a class="active" href="javascript:void(0)">Tất cả</a></li>
                    @if(!empty($data['data']['apartment_sale']))
                        @foreach($data['data']['apartment_sale']['items']['district'] as $key => $item)
                            <li class="item" data-filter="apartment_sale_{{ $key }}">
                                <a href="javascript:void(0)" id="product-{{ $key }}">{{ $item }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <a href="{{ route('category.nha-ban') }}" class="view-all">Xem tất cả</a>
            </div>

            <div class="project-list">
                <div class="row">
                    @if(!empty($data['data']['apartment_sale']))
                        @foreach($data['data']['apartment_sale']['items']['products'] as $key => $items)
                            @foreach($items as $item)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-custom apartment_sale_{{ $key }}">
                                    <div class="project-item-wrapper">
                                        <a href="{{ route('category.show', $item['id']) }}" class="total-content">
                                            <div class="media-block">
                                                <div class="wrap-img">
                                                    <img src="{{ $item['image_url'].$item['image'] }}" alt="">
                                                </div>
                                                <div class="lb-wrap">
                                                    @if($item['is_hot'] == 1)
                                                        <span class="lb-pj lb-noibat">Nổi bật</span>
                                                    @endif
                                                    @if($item['is_new'] == 1)
                                                        <span class="lb-pj lb-giamgia">Giảm giá</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="content-info-block">
                                                <p class="name tooltip-text" data-toggle="tooltip" data-placement="right"
                                                   title="{!! $item['name'] !!}">{!! $item['name'] !!}</p>
                                                <div class="location">
                                                    <span>{{ $item['address'] }}</span>
                                                </div>
                                                <div class="price">
                                                    <span class="current-price">{{ format_price($item['price']) }}</span>
                                                </div>
                                                <div class="show-info">
                                            <span class="square icon">
                                                <img src="{{ asset('html/assets/images/icons/dt.png') }}" alt="">
                                                85m2
                                            </span>
                                                    <span class="icon bed">
                                                <img src="{{ asset('html/assets/images/icons/bed.png') }}" alt="">
                                                {{ $item['bedroom'] }}
                                            </span>
                                                    <span class="icon bath">
                                                <img src="{{ asset('html/assets/images/icons/bath.png') }}" alt="">
                                                {{ $item['bathroom'] }}
                                            </span>
                                                    <span class="icon furniture">
                                                <img src="{{ asset('html/assets/images/icons/nt.png') }}" alt="">
                                                {{ $item['position'] }}
                                            </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- end section -->
    <section class="block-projects">
        <div class="container">
            <h3 class="title-block">{{ $data['data']['townhouse_sale']['name'] ?? '' }}</h3>
            <div class="place-slide">
                <ul class="list-place-slide slide-place-action">
                    <li class="item" data-filter="all"><a class="active" href="javascript:void(0)">Tất cả</a></li>
                    @if(!empty($data['data']['townhouse_sale']['items']['district']))
                        @foreach($data['data']['townhouse_sale']['items']['district'] as $key => $item)
                            <li class="item" data-filter="townhouse_sale_{{ $key }}"><a href="javascript:void(0)" id="product-{{ $key }}">{{ $item }}</a></li>
                        @endforeach
                    @endif
                </ul>
                <a href="{{ route('category.nha-ban') }}" class="view-all">Xem tất cả</a>
            </div>
            <div class="project-list">
                <div class="row">
                    @if(!empty($data['data']['townhouse_sale']['items']['products']))
                        @foreach($data['data']['townhouse_sale']['items']['products'] as $key => $items)
                            @foreach($items as $item)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-custom townhouse_sale_{{ $key }}">
                                    <div class="project-item-wrapper">
                                        <a href="{{ route('category.show', $item['id']) }}" class="total-content">
                                            <div class="media-block">
                                                <div class="wrap-img">
                                                    <img src="{{ $item['image_url'].$item['image'] }}" alt="">
                                                </div>
                                                <div class="lb-wrap">
                                                    @if($item['is_hot'] == 1)
                                                        <span class="lb-pj lb-noibat">Nổi bật</span>
                                                    @endif
                                                    @if($item['is_new'] == 1)
                                                        <span class="lb-pj lb-giamgia">Giảm giá</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="content-info-block">
                                                <p class="name tooltip-text" data-toggle="tooltip" data-placement="right"
                                                   title="{!! $item['name'] !!}">{!! $item['name'] !!}</p>
                                                <div class="location">
                                                    <span>{{ $item['address'] }}</span>
                                                </div>
                                                <div class="price">
                                                    <span class="current-price">{{ format_price($item['price']) }}</span>
                                                </div>
                                                <div class="show-info">
                                            <span class="square icon">
                                                <img src="{{ asset('html/assets/images/icons/dt.png') }}" alt="">
                                                85m2
                                            </span>
                                                    <span class="icon bed">
                                                <img src="{{ asset('html/assets/images/icons/bed.png') }}" alt="">
                                                {{ $item['bedroom'] }}
                                            </span>
                                                    <span class="icon bath">
                                                <img src="{{ asset('html/assets/images/icons/bath.png') }}" alt="">
                                                {{ $item['bathroom'] }}
                                            </span>
                                                    <span class="icon furniture">
                                                <img src="{{ asset('html/assets/images/icons/nt.png') }}" alt="">
                                                {{ $item['position'] }}
                                            </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <section class="block-projects">
        <div class="container">
            <h3 class="title-block">{{ $data['data']['apartment_rent']['name'] ?? '' }}</h3>
            <div class="place-slide">
                <ul class="list-place-slide slide-place-action">
                    <li class="item" data-filter="all"><a class="active" href="javascript:void(0)">Tất cả</a></li>
                    @if(!empty($data['data']['apartment_rent']['items']['district']))
                        @foreach($data['data']['apartment_rent']['items']['district'] as $key => $item)
                            <li class="item" data-filter="apartment_rent_{{ $key }}"><a href="javascript:void(0)" id="product-{{ $key }}">{{ $item }}</a></li>
                        @endforeach
                    @endif
                </ul>
                <a href="{{ route('category.nha-ban') }}" class="view-all">Xem tất cả</a>
            </div>
            <div class="project-list">
                <div class="row">
                    @if(!empty($data['data']['apartment_rent']['items']['products']))
                        @foreach($data['data']['apartment_rent']['items']['products'] as $key => $items)
                            @foreach($items as $item)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-custom apartment_rent_{{ $key }}">
                                    <div class="project-item-wrapper">
                                        <a href="{{ route('category.show', $item['id']) }}" class="total-content">
                                            <div class="media-block">
                                                <div class="wrap-img">
                                                    <img src="{{ $item['image_url'].$item['image'] }}" alt="">
                                                </div>
                                                <div class="lb-wrap">
                                                    @if($item['is_hot'] == 1)
                                                        <span class="lb-pj lb-noibat">Nổi bật</span>
                                                    @endif
                                                    @if($item['is_new'] == 1)
                                                        <span class="lb-pj lb-giamgia">Giảm giá</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="content-info-block">
                                                <p class="name tooltip-text" data-toggle="tooltip" data-placement="right"
                                                   title="{!! $item['name'] !!}">{!! $item['name'] !!}</p>
                                                <div class="location">
                                                    <span>{{ $item['address'] }}</span>
                                                </div>
                                                <div class="price">
                                                    <span class="current-price">{{ format_price($item['price']) }}</span>
                                                </div>
                                                <div class="show-info">
                                            <span class="square icon">
                                                <img src="{{ asset('html/assets/images/icons/dt.png') }}" alt="">
                                                85m2
                                            </span>
                                                    <span class="icon bed">
                                                <img src="{{ asset('html/assets/images/icons/bed.png') }}" alt="">
                                                {{ $item['bedroom'] }}
                                            </span>
                                                    <span class="icon bath">
                                                <img src="{{ asset('html/assets/images/icons/bath.png') }}" alt="">
                                                {{ $item['bathroom'] }}
                                            </span>
                                                    <span class="icon furniture">
                                                <img src="{{ asset('html/assets/images/icons/nt.png') }}" alt="">
                                                {{ $item['position'] }}
                                            </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <section class="block-projects">
        <div class="container">
            <h3 class="title-block">{{ isset($data['data']['townhouse_rent']['name']) ?? '' }}</h3>
            <div class="place-slide">
                <ul class="list-place-slide slide-place-action">
                    <li class="item" data-filter="all"><a class="active" href="javascript:void(0)">Tất cả</a></li>
                    @if(!empty($data['data']['townhouse_rent']['items']['district']))
                        @foreach($data['data']['townhouse_rent']['items']['district'] as $key => $item)
                            <li class="item" data-filter="townhouse_rent_{{ $key }}"><a href="javascript:void(0)" id="product-{{ $key }}">{{ $item }}</a></li>
                        @endforeach
                    @endif
                </ul>
                <a href="{{ route('category.nha-ban') }}" class="view-all">Xem tất cả</a>
            </div>
            <div class="project-list">
                <div class="row">
                    @if(!empty($data['data']['townhouse_rent']['items']['products']))
                        @foreach($data['data']['townhouse_rent']['items']['products'] as $key => $items)
                            @foreach($items as $item)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-custom townhouse_rent_{{ $key }}">
                                    <div class="project-item-wrapper">
                                        <a href="{{ route('category.show', $item['id']) }}" class="total-content">
                                            <div class="media-block">
                                                <div class="wrap-img">
                                                    <img src="{{ $item['image_url'].$item['image'] }}" alt="">
                                                </div>
                                                <div class="lb-wrap">
                                                    @if($item['is_hot'] == 1)
                                                        <span class="lb-pj lb-noibat">Nổi bật</span>
                                                    @endif
                                                    @if($item['is_new'] == 1)
                                                        <span class="lb-pj lb-giamgia">Giảm giá</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="content-info-block">
                                                <p class="name tooltip-text" data-toggle="tooltip" data-placement="right"
                                                   title="{!! $item['name'] !!}">{!! $item['name'] !!}</p>
                                                <div class="location">
                                                    <span>{{ $item['address'] }}</span>
                                                </div>
                                                <div class="price">
                                                    <span class="current-price">{{ format_price($item['price']) }}</span>
                                                </div>
                                                <div class="show-info">
                                            <span class="square icon">
                                                <img src="{{ asset('html/assets/images/icons/dt.png') }}" alt="">
                                                85m2
                                            </span>
                                                    <span class="icon bed">
                                                <img src="{{ asset('html/assets/images/icons/bed.png') }}" alt="">
                                                {{ $item['bedroom'] }}
                                            </span>
                                                    <span class="icon bath">
                                                <img src="{{ asset('html/assets/images/icons/bath.png') }}" alt="">
                                                {{ $item['bathroom'] }}
                                            </span>
                                                    <span class="icon furniture">
                                                <img src="{{ asset('html/assets/images/icons/nt.png') }}" alt="">
                                                {{ $item['position'] }}
                                            </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@section('after_styles')
    <style>
        .hightlight-projects .container .list-hightlight-pj a {
            width: 220px;
            height: 130px;
            position: relative;
        }
        .list-hightlight-pj .item .wrapper-wp-img {
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 10px;
        }
        .list-hightlight-pj .item .wrapper-wp-img .wp-img {
            width: 100%;
            height: 100%;
            transition: all 0.3s;
        }
        .list-hightlight-pj .item .wp-img > div {
            width: 100%;
            height: 100%;
            position: relative;
            padding-bottom: calc(100% * 130 / 220);
        }
        .list-hightlight-pj .item .wp-img > div img {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            object-position: center;
            object-fit: cover;
        }
        .hightlight-projects .container .list-hightlight-pj a:hover img {
            transform: translate(-50%, -50%);
        }
        .hightlight-projects .container .list-hightlight-pj .wrapper-wp-img:hover .wp-img {
            transform: scale(1.1);
        }
        .hightlight-projects .container .list-hightlight-pj a:hover .info {
            color: unset;
            position: unset;
            bottom: unset;
            left: unset;
            right: unset;
            z-index: unset;
            background: unset;
            padding: unset;
            border-bottom-right-radius: unset;
            border-bottom-left-radius: unset;
        }
        .hightlight-projects .container .list-hightlight-pj .wrapper-wp-img:hover + .info {
            color: #fff;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 3;
            background: rgba(0, 0, 0, 0.5);
            padding: 12px 15px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
        }
    </style>
@endsection

@section('after_scripts')
    <script>
        $(function(){
            $(document).on('click','.select_district',function(){
                let block_projects = $(this).closest('.block-projects');
                let district_id = $(this).data('id');
                let elm = '.project_list_'+block_projects.find('.project-list').data('id')+' .row';
                $(elm).slick('unslick');
                if(!district_id){
                    block_projects.find('.row').html(block_projects.find('.row_hidden').html());
                }else{
                    block_projects.find('.row').html('');
                    block_projects.find('.row_hidden .district_'+district_id).each(function(){
                        block_projects.find('.row').append($(this).html());
                    });
                }
                project_list(elm);
            })
        })
    </script>
@stop
