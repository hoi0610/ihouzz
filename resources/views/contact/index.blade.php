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
        ['link' => '#', 'name' => 'Liên hệ']
    ]])

    @include('includes.option')

    <section class="wrap-contact">
        <div class="container">
            <div class="contact-content row">
                @if(!empty($data))
                    <strong class="title-main">{{ $data['title'] }}</strong>
                    <div class="col-md-6">
                        <img src="{{ $data['image_url'] . $data['image_location'] }}" alt="">
                        {!! $data['content'] !!}
                    </div>
                @else
                    <div class="col-md-6"></div>
                @endif
                <div class="col-md-6">
                    <div class="box-shadow">
                        <div class="box-contact">
                            <strong>Bạn có câu hỏi cần trợ giúp? Bạn cần iHouzz hỗ trợ, giải đáp gì?</strong>
                            <strong>Hãy liên hệ với iHouzz theo thông tin dưới đây:</strong>
                            <div class="info-contact-list">
                                <div class="info">
                                    <img src="/html/assets/images/icons/phone-call-color.png" alt="">
                                    <span class="text">Hotline: <a href="#" class="phone">1900277211</a></span>
                                </div>
                                <div class="info">
                                    <img src="/html/assets/images/icons/mail.png" alt="">
                                    <span class="text">Email: <a href="#" class="phone">hello@iHouzz</a></span>
                                </div>
                            </div>
                            <strong>Hoặc gửi tin nhắn trực tiếp cho chúng tôi:</strong>
                            <form action="" class="form-contact">
                                <div class="form-group">
                                    <label for="">Họ và tên</label>
                                    <input type="text" class="form-control" placeholder="Nhập họ và tên">
                                </div>
                                <div class="form-group">
                                    <label for="">Điện thoại</label>
                                    <input type="text" class="form-control" placeholder="Vd: 0987987675">
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ Email</label>
                                    <input type="text" class="form-control" placeholder="Vd: nguyenvana@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="">Tiêu đề</label>
                                    <input type="text" class="form-control" placeholder="Nhập tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="">Thông tin chi tiết</label>
                                    <input type="text" class="form-control" placeholder="Nhập mô tả">
                                </div>
                                <div class="wp-button"><button class="btn btn-primary">Gửi</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


