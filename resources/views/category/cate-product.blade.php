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
                    <h3 class="title-block">Nhà
                        @php if ($params['product_type_id'] == 1) echo('bán'); else echo('thuê'); @endphp @if(!is_null($params['province_id']) && $params['province_id'] != '') tại {{ $province_name ?? '' }} @endif</h3>
                    <p>Hiện có <b class="yellow">{{ $data['total'] ?? '' }}</b> căn
                        @php if ($params['product_type_id'] == 1) echo('đang bán'); else echo('cho thuê'); @endphp
                    </p>
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
                        <img src="/html/assets/images/icons/sort-down.png" alt="">
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
                {{ isset($params['show']) ? ($params['show'] == 'grid-tab' ? 'active' : '') : 'active' }}"
                     id="grid" role="tabpanel" aria-labelledby="grid-tab">
                    <div class="main-content">
                        <div class="list-project-poverties">
                            <div class="row">
                                @if(isset($data['data']) && !empty($data['data']))
                                    @foreach($data['data'] as $key => $item)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-custom">
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
                                                            <span>{{ $item['ward_name'] }}, {{ $item['district_name'] }}, {{ $item['province_name'] }}</span>
                                                        </div>
                                                        <div class="price">
                                                            <span class="current-price">{{ format_price($item['price']) }}</span>
                                                        </div>
                                                        <div class="show-info">
                                                            <span class="square icon">
                                                                <img src="{{ asset('html/assets/images/icons/dt.png') }}" alt="">
                                                                {{ $item['acreage'] }}m2
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
                                                                {{ $item['is_furniture'] }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <x-paginator-custom :data="$data"/>
                    </div>
                </div>
                <div class="tab-pane fade {{ isset($params['show']) ? ($params['show'] == 'list-tab' ? 'show' : '') : 'show' }}
                {{ isset($params['show']) ? ($params['show'] == 'list-tab' ? 'active' : '') : '' }}" id="list" role="tabpanel" aria-labelledby="list-tab">
                    <div class="main-content">
                        <div class="list-project-poverties">
                            <div class="row">
                                <div class="col-md-9">
                                    @if(isset($data['data']) && !empty($data['data']))
                                        @foreach($data['data'] as $key => $item)
                                            <div class="list-project-poverties">
                                                <div class="project-item-horizontal">
                                                    <div class="media-block">
                                                        <a href="{{ route('category.show', $item['id']) }}">
                                                            <div class="wrap-img">
                                                                <img src="{{ $item['image_url'].$item['image'] }}" alt="">
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="content-info-block">
                                                        <div class="lb-wrap">
                                                            @if(isset($item['is_hot']) && $item['is_hot'] == 1)
                                                                <span class="lb-pj lb-noibat">Nổi bật</span>
                                                            @endif
                                                            @if(isset($item['is_new']) && $item['is_new'] == 1)
                                                                <span class="lb-pj lb-giamgia">Giảm giá</span>
                                                            @endif
                                                        </div>
                                                        <a href="{{ route('category.show', $item['id']) }}" class="name">{{ $item['name'] }}</a>
                                                        <div class="price">
                                                            <span class="current-price">{{ format_price($item['price']) }}</span>
                                                        </div>
                                                        <div class="location">
                                                            <span>{{ $item['ward_name'] }}, {{ $item['district_name'] }}, {{ $item['province_name'] }}</span>
                                                        </div>
                                                        <div class="line-bottom">
                                                            <div class="show-info">
                                                            <span class="square icon">
                                                                <img src="{{ asset('html/assets/images/icons/dt.png') }}" alt="">
                                                                {{ $item['acreage'] }}m2
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
                                                                Nội thất
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <x-paginator-custom :data="$data"/>
                                </div>
                                <div class="col-md-3 no-padding-left">
                                    <div class="wrap-box">
                                        <a href="#" class="btn-hightlight">Gửi bán nhà</a>
                                        <a href="#" class="btn-hightlight">Gửi cho thuê nhà</a>
                                        <x-count-product-sell/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
