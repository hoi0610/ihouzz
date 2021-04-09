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
                            <h4 class="title">Đổi mật khẩu</h4>
                            <p>Nhập mật khẩu mới và xác nhận để thay đổi mật khẩu.</p>
                        </div>
                        @if(session('error_message'))
                            <ul class="alert alert-danger">
                                @foreach(session('error_message') as $message)
                                    <li>{{ $message['0'] }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(session('success_message'))
                            <div class="alert alert-success">{{ session('success_message') }}</div>
                        @endif

                        <form action="{{ route('account.change-pass') }}" class="form-account" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group group-input-icon">
                                <label for="">Nhập mật khẩu cũ <span class="red">*</span></label>
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Nhập mật khẩu cũ"
                                    name="password_old"
                                    @error('password_old') style="border-color: red" @enderror
                                >
                                @error('password_old') <span style="color: red">{{ $message }}</span> @enderror
                                <span class="icon"><img src="/html/assets/images/icons/key_.png" alt=""></span>
                            </div>
                            <div class="form-group group-input-icon">
                                <label for="">Nhập mật khẩu mới <span class="red">*</span></label>
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Nhập mật khẩu mới"
                                    name="password"
                                    @error('password') style="border-color: red" @enderror
                                >
                                @error('password') <span style="color: red">{{ $message }}</span> @enderror
                                <span class="icon"><img src="/html/assets/images/icons/key_.png" alt=""></span>
                            </div>
                            <div class="form-group group-input-icon">
                                <label for="">Nhập mật khẩu mới <span class="red">*</span></label>
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Nhập mật khẩu mới"
                                    name="password_confirmation"
                                    @error('password_confirmation') style="border-color: red" @enderror
                                >
                                @error('password_confirmation') <span style="color: red">{{ $message }}</span> @enderror
                                <span class="icon"><img src="/html/assets/images/icons/key_.png" alt=""></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
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
