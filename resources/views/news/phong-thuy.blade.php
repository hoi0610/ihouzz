@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => '#', 'name' => 'Phong thủy'],
    ]])
    @include('includes.option')
    <section class="wrap-news-page">
        <div class="container">
            <h3 class="title-block">Phong thủy</h3>
            <div class="news-content row">
                <div class="col-md-9">
                    <ul class="list-item-horizontal-news">
                        @foreach($data['data'] as $item)
                        <li class="item">
                            <a href="{{ route('phong-thuy-detail', $item['id']) }}">
                                <div class="wp-img"><img src="{{ $item['image_location'] }}" alt=""></div>
                                <div class="right-content">
                                    <strong class="title">{{ $item['title'] }}
                                    </strong>
                                    <div class="time"><i class="far fa-clock"></i> {{ date('Y/m/d', strtotime($item['updated_at'])) }}</div>
                                    <div class="text">
                                        {!! $item['description'] !!}
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <x-paginator-custom :data="$data"/>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="wrap-box">
                        <x-count-product-sell/>
                        <a href="#" class="banner-box">
                            <img src="/html/assets/images/banner-box2.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
