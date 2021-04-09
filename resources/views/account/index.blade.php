@extends('layouts.master')

@section('body_class', 'refresh-page  page-header-static')
@section('main_class', 'news-page')

@section('content')
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => '#', 'name' => 'Quản lý tài khoản'],
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
                            <h4 class="title">Thông tin tài khoản</h4>
                        </div>
                        <form class="form-account" id="frm_info" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group group-input-icon">
                                <label for="name">Họ và tên <span class="red">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên"
                                       value="{{$customer['name'] ?? ''}}">
                                <span class="icon"><img src="/html/assets/images/icons/user_profile.png" alt=""></span>
                            </div>
                            <div class="form-group group-input-icon">
                                <label for="birthday">Ngày sinh<span class="red">*</span></label>
                                <input type="text" name="birthday" id="birthday"
                                       class="form-control DatePicker" placeholder="Chọn ngày sinh"
                                       value="{{old('birthday', output_date($customer['birthday'] ?? ''))}}">
                                <span class="icon"><img src="/html/assets/images/icons/calendar.png" alt=""></span>
                            </div>
                            <div class="form-group group-input-icon">
                                <label for="gender">Giới tính<span class="red">*</span></label>
                                <?php
                                $gender = old('gender', $customer['gender'] ?? '');
                                ?>
                                <div class="group-gender">
                                    <div class="radio">
                                        <input type="radio" name="gender" id="male" value="male" {{$gender=='male' ? 'checked="true"' : ''}}>
                                        <label for="male">Nam</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="gender" id="female" value="female" {{$gender=='female' ? 'checked="true"' : ''}}>
                                        <label for="female">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group group-input-icon">
                                <label for="phone">Số điện thoại<span class="red">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại"
                                       value="{{old('phone', $customer['phone'] ?? '')}}">
                                <span class="icon"><img src="/html/assets/images/icons/telephone-(1).png" alt=""></span>
                            </div>
                            <div class="form-group group-input-icon">
                                <label for="email">Email<span class="red">*</span></label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Nhập email"
                                       value="{{old('email', $customer['email'] ?? '')}}">
                                <span class="icon"><img src="/html/assets/images/icons/e-mail.png" alt=""></span>
                                <span class="red email-action">Kích hoạt email tại đây</span>
                            </div>
                            <button type="button" class="btn btn-primary">Lưu thông tin</button>
                        </form>
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
