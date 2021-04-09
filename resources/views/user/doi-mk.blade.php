@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')

    <section class="manage-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-left-account">
                        <div class="top-account-info">
                            <div class="image-upload">
                                <label for="file-input">
                                    <img class="account" id="blah1" src="/html/assets/images/account.png" alt="your image">
                                    <div class="wrap-bg" >
                                        <img class="display " src="/html/assets/images/icons/photo-camera.png" alt="your image">
                                    </div>
                                    <input id="file-input" type="file" onchange="readURL(this);" >
                                </label>
                            </div>

                            <div class="info-text">
                                <strong class="name">nguyễn vũ minh thiên</strong>
                                <p>Chuyên viên môi giới</p>
                                <p>Thành viên từ 01/01/2021</p>
                                <a href="#" class="btn btn-border">Đăng ký hợp tác</a>
                            </div>
                        </div>

                        <div class="bottom-account">
                            <ul class="list-action-account">
                                <li>
                                    <a href="account-infomation.html">
                                        <span class="icon"><img src="/html/assets/images/icons/user_profile.png" alt=""></span> <span class="text">Thông tin tài khoản</span>
                                    </a>
                                </li>
                                <li >
                                    <a href="bds-cua-toi.html">
                                        <span class="icon"><img src="/html/assets/images/icons/quarantine.png" alt=""></span> <span class="text">Bất động sản của tôi</span>
                                    </a>
                                </li>
                                <li >
                                    <a href="bo-suu-tap.html">
                                        <span class="icon"><img src="/html/assets/images/icons/image.png" alt=""></span> <span class="text">Bộ sưu tập</span>
                                    </a>
                                </li>
                                <li >
                                    <a href="ihouzz-pay.html">
                                        <span class="icon"><img src="/html/assets/images/icons/wallet-brown.png" alt=""></span> <span class="text">iHouzz pay</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="doi-mk.html">
                                        <span class="icon"><img src="/html/assets/images/icons/key_.png" alt=""></span> <span class="text">Đổi mật khẩu</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon"><img src="/html/assets/images/icons/setting.png" alt=""></span> <span class="text">Cài đặt</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon"><img src="/html/assets/images/icons/power-button.png" alt=""></span> <span class="text">Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box box-account-info">
                        <div class="header">
                            <h4 class="title">Đổi mật khẩu</h4>
                            <p>Nhập mật khẩu mới và xác nhận để thay đổi mật khẩu.</p>
                        </div>

                        <form action="" class="form-account">
                            <div class="form-group group-input-icon">
                                <label for="">Nhập mật khẩu cũ <span class="red">*</span></label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu cũ">
                                <span class="icon"><img src="/html/assets/images/icons/key_.png" alt=""></span>
                            </div>
                            <div class="form-group group-input-icon">
                                <label for="">Nhập mật khẩu mới <span class="red">*</span></label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới">
                                <span class="icon"><img src="/html/assets/images/icons/key_.png" alt=""></span>
                            </div>
                            <div class="form-group group-input-icon">
                                <label for="">Nhập mật khẩu mới <span class="red">*</span></label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới">
                                <span class="icon"><img src="/html/assets/images/icons/key_.png" alt=""></span>
                            </div>
                            <button class="btn btn-primary">Đổi mật khẩu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
