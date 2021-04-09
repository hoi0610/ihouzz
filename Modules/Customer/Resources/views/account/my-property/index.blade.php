@extends('layouts.master')

@section('body_class', 'refresh-page  page-header-static')
@section('main_class', 'news-page')

@section('content')
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => '#', 'name' => 'Quản lý tài khoản']
    ]])

    <section class="manage-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('account.includes.side-bar')
                </div>
                <div class="col-md-9">
                    <div class="box box-account-info">
                        <div class="header">
                            <h4 class="title">Bất động sản của tôi</h4>
                            <p>Hiện có <span class="blue">01</span> bất động sản nào được tạo</p>
                        </div>
                        <div class="body">
                            <div class="project-item-horizontal">
                                <div class="media-block">
                                    <a href="chi-tiet-nha-ban.html">
                                        <div class="wrap-img">
                                            <img src="/html/assets/images/img/project-list.png" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="content-info-block">
                                    <a href="chi-tiet-nha-ban.html" class="name">Bán căn hộ 3PN Vinhomes Cenntral Park - Đầy đủ nội thất, đã bàn giao, có sổ</a>
                                    <div class="location">
                                        <span>Phường 22, quận Bình Thạnh, TPHCM</span>
                                    </div>
                                    <div class="price">
                                        <span class="current-price">2,5 Tỷ</span>
                                    </div>
                                    <div class="line-bottom">
                                        <div class="show-info">
                                            <span class="square icon">
                                                <img src="/html/assets/images/icons/dt.png" alt="">
                                                85m2
                                            </span>
                                            <span class="icon bed">
                                                <img src="/html/assets/images/icons/bed.png" alt="">
                                                3
                                            </span>
                                            <span class="icon bath">
                                                <img src="/html/assets/images/icons/bath.png" alt="">
                                                2
                                            </span>
                                            <span class="icon furniture">
                                                <img src="/html/assets/images/icons/nt.png" alt="">
                                                Nội thất
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-item-horizontal">
                                <div class="media-block">
                                    <a href="chi-tiet-nha-ban.html">
                                        <div class="wrap-img">
                                            <img src="/html/assets/images/img/project-list.png" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="content-info-block">
                                    <a href="chi-tiet-nha-ban.html" class="name">Bán căn hộ 3PN Vinhomes Cenntral Park - Đầy đủ nội thất, đã bàn giao, có sổ</a>
                                    <div class="location">
                                        <span>Phường 22, quận Bình Thạnh, TPHCM</span>
                                    </div>
                                    <div class="price">
                                        <span class="current-price">2,5 Tỷ</span>
                                    </div>
                                    <div class="line-bottom">
                                        <div class="show-info">
                                            <span class="square icon">
                                                <img src="/html/assets/images/icons/dt.png" alt="">
                                                85m2
                                            </span>
                                            <span class="icon bed">
                                                <img src="/html/assets/images/icons/bed.png" alt="">
                                                3
                                            </span>
                                            <span class="icon bath">
                                                <img src="/html/assets/images/icons/bath.png" alt="">
                                                2
                                            </span>
                                            <span class="icon furniture">
                                                <img src="/html/assets/images/icons/nt.png" alt="">
                                                Nội thất
                                            </span>
                                        </div>
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
    <script src="/html/assets/js/jquery.validate.min.js" type="text/javascript"></script>

    <script>
        $(function() {
            add_rule_phone_number();
            $('#frm_info').validate({
                ignore: ".ignore",
                rules:{
                    'name': {
                        required: true
                    },
                    'phone': {
                        required: true,
                        minlength: 10,
                        maxlength: 11,
                        rgphone: true
                    },
                    'email': {
                        required: true,
                        email: true
                    }
                },
                messages:{
                    'name': {
                        required: '{!! __('customer.name_input') !!}'
                    },
                    'phone': {
                        required: '{!! __('customer.phone_input') !!}',
                        minlength: "{!! __('customer.phone_input_min') !!}",
                        maxlength: "{!! __('customer.name_input_max') !!}",
                    },
                    'email': {
                        required: '{!! __('customer.email_input') !!}',
                        email: '{!! __('customer.email_input_invalidate') !!}'
                    },
                    'old-password': {
                        required: '{!! __('customer.password_old_input') !!}'
                    },
                    'password': {
                        required: '{!! __('customer.password_new_input') !!}',
                        minlength: "{!! __('customer.password_input_min') !!}",
                    },
                    're-password':{
                        equalTo:'{!! __('customer.repassword_input_not_match') !!}'
                    }
                },
                submitHandler: function(form, e) {
                    e.preventDefault();
                    var data= new FormData(form);
                    var files = $('#file-input')[0].files[0];
                    if (files!=undefined) {
                        data.append('avatar_file', files);
                    }

                    var url = $(form).attr('action');
                    ajax_loading(true);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: "JSON",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function (data, status)
                        {
                            ajax_loading(false);
                            if(data.rs){
                                alert_success(data.msg, '{!! __('customer.account_information_update') !!}', function(){
                                    location.reload();
                                });
                            }else{
                                if (data.errors) {
                                    $.each(data.errors, function (key, msg) {
                                        $('#'+key+'-error').html(msg).show();
                                    });
                                }
                            }
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@stop
