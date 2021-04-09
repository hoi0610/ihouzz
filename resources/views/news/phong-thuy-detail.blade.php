@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    @if(isset($data))
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => route('phong-thuy'), 'name' => 'Phong thủy'],
        ['link' => '#', 'name' => $data['title']]
    ]])
    @endif

    @include('includes.option')

    <section class="wrap-news-detail">
        <div class="container">
            <div class="news-content row">
                <div class="col-md-9">
                    <div class="content-news-detail">
                        <strong class="title-main">{{ $data['title'] }}
                        </strong>
                        <div class="info-detail-top">
                            <span class="time info"><i class="far fa-clock"></i> {{ date('Y/m/d', strtotime($data['updated_at'])) }}</span>
                            <span class="viewer info"><i class="far fa-eye"></i> {{ $data['view_count'] }}</span>
                            <span class="share info"><i class="far fa-share-square"></i> {{ $data['comment_count'] }}</span>
                        </div>
                        <strong>{!! $data['description'] !!}</strong>
                        <br>
                        <br>

                        {!! $data['content'] !!}
                    </div>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="wrap-box">
                        <div class="box box-district">
                            <h3 class="title">Danh mục cẩm nang</h3>
                            <ul class="list-district">
                                <li><a href="#">Tất cả (68584)</a></li>
                                <li><a href="#">Phong cách sống (3747)</a></li>
                                <li><a href="#">Kinh nghiệm (37574)</a></li>
                            </ul>
                        </div>

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
