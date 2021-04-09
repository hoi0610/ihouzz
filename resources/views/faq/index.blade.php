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
        ['link' => '#', 'name' => 'Câu hỏi thường gặp']
    ]])

    @include('includes.option')

    <section class="wrap-faq">
        <div class="container">
            <strong class="title-main">Câu hỏi thường gặp</strong>
            <div class="contact-faq ">
                <p class="title-blue color">Vui lòng chọn vị trí thuộc câu hỏi sử dụng của bạn</p>
                <div class="row choose-opt-block">
                    @foreach($data as $item)
                    <div class="col-md-3 one-block">
                        <img src="{{ isset($item['image']) ? $item['image'] : '/html/assets/images/customer1.png' }}" alt="">
                        <div class="text">
                            <strong class="title">{{ $item['name'] }}</strong>
                            <a href="{{ route('faq-detail', $item['id'])  }}" class="btn btn-border">Xem chi tiết ></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
