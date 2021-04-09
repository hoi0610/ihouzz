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
        ['link' => route('tin-tuc.index'), 'name' => 'Tin tức bất động sản'],
        ['link' => '#', 'name' => $data['title']]
    ]])
    @endif

    @include('includes.option')

    <section class="wrap-news-detail">
        <div class="container">
            <div class="news-content row">
                <div class="col-md-9">
                    <div class="content-news-detail">
                        <strong class="title-main">{{ $data['title'] ?? '' }}</strong>
                        <div class="info-detail-top">
                            <span class="time info"><i class="far fa-clock"></i> {{ date('Y/m/d', strtotime($data['updated_at']  ?? '')) }}</span>
                            <span class="viewer info"><i class="far fa-eye"></i> {{ $data['view_count']  ?? '' }}</span>
                            <span class="share info"><i class="far fa-share-square"></i> {{ $data['comment_count'] ?? '' }}</span>
                        </div>
                        <strong>{!! $data['description'] ?? '' !!}</strong>
                        <br>
                        <br>

                        {!! $data['content'] ?? '' !!}
                    </div>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="wrap-box">
                        <strong class="title-hot">Tin nóng</strong>
                        <div class="slide-news-small">
                            <div class="item-slide wrap-hot-news-small">

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                            </div>
                            <div class="item-slide wrap-hot-news-small">

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                            </div>
                            <div class="item-slide wrap-hot-news-small">

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                                <a href="#" class="item">
                                    <div class="wrap-img"><img src="{{ asset('html/assets/images/hot-news.png') }}" alt=""></div>
                                    <div class="text-content">5 xu hướng sẽ dẫn dắt thị trường bất động sản Việt Nam trong năm 2021</div>
                                </a>

                            </div>
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

