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
        ['link' => route('support'), 'name' => 'Hỗ trợ khách hàng']
    ]])

    @include('includes.option')

    <section class="wrap-news-detail">
        <div class="container">
            <div class="news-content row">
                <div class="col-md-9">
                    <div class="content-news-detail">
                        @if(!empty($data))
                        <strong class="title-main">{{ $data['title'] }}</strong>
                        {!! $data['content'] !!}
                        @endif
                    </div>
                </div>
                <div class="col-md-3 no-padding-left">
                    <div class="wrap-box">
                        <div class="box box-district">
                            <h3 class="title">Danh mục</h3>
                            <ul class="list-district">
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Quy định và hình thức thanh toán</a></li>
                                <li><a href="#">Giải quyết khiếu nại</a></li>
                                <li><a href="#">Câu hỏi thường gặp</a></li>
                                <li><a href="#">Hình thức thanh toán</a></li>
                                <li><a href="#">Thông tin dịch vụ</a></li>
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
