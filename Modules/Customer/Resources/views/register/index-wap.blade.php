@extends('customer::layouts.login-wap')

@section('content')
    <main class="page-login register">
        <div class="container">
            <div class="content-login">
                @include('customer::includes.header-login')

                <div class="form-login">
                    <form id="frm_register" action="" method="post" class="form-horizontal">
                        @csrf

                        @if(session()->has('message'))
                            <div class="alert alert-warning" style="text-align: center">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <input type="text" id="name" name="name" class="form-control" placeholder="{!! __('customer.name') !!}">
                            <label id="name-error" class="error" for="name"></label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="{!! __('customer.phone') !!}">
                            <label id="phone-error" class="error" for="phone"></label>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="{!! __('customer.email') !!}">
                            <label id="email-error" class="error" for="email"></label>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="{!! __('customer.password') !!}">
                            <i class="fas fa-eye right-icon"></i>
                            <label id="password-error" class="error" for="password"></label>
                        </div>
                        <div class="form-group">
                            <input type="password" name="re-password" id="re-password" class="form-control" placeholder="{!! __('customer.repassword_input') !!}">
                            <i class="fas fa-eye right-icon"></i>
                            <label id="re-password-error" class="error" for="re-password"></label>
                        </div>

                        <p class="note">{!! __('customer.terms_register', ['app_name' => config('app.name')]) !!}</p>
                        <button type="submit" class="btn btn-primary">{!! __('customer.register') !!}</button>
                    </form>
                </div>
            </div>
        </div>

        <p class="fix-bottom">{!! __('customer.have_account', ['link' => route('login')]) !!}</p>

    </main>
@endsection

@section('after_styles')
    <style type="text/css">
        label.error{
            display: none;
        }
        .form-group label.error {
            float: right;
        }
    </style>
@stop

@section('after_scripts')
    <script type="text/javascript" src="/html/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(function(){
            add_rule_phone_number();
            $('#frm_register').validate({
                ignore: ".ignore",
                rules:{
                    'check': {
                        required: true
                    },
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
                    },
                    'password': {
                        required: true,
                        minlength: 6,
                    },
                    're-password':{
                        equalTo: "#password"
                    }
                },
                messages:{
                    'name': {
                        required: '{!! __('customer.name_input') !!}'
                    },
                    'phone': {
                        required: '{!! __('customer.phone_input') !!}',
                        minlength: "{!! __('customer.phone_input_min') !!}",
                        maxlength: "{!! __('customer.phone_input_max') !!}",
                    },
                    'email': {
                        required: '{!! __('customer.email_input') !!}',
                        email: '{!! __('customer.email_input_invalidate') !!}'
                    },
                    'password': {
                        required: '{!! __('customer.password_input') !!}',
                        minlength: "{!! __('customer.password_input_min') !!}",
                    },
                    're-password':{
                        equalTo:'{!! __('customer.repassword_input_not_match') !!}'
                    }
                },
                submitHandler: function(form) {
                    var data = $(form).serializeArray();
                    var url = $(form).attr('action');
                    ajax_loading(true);
                    $.post(url, data).done(function(data) {
                        ajax_loading(false);
                        if(data.rs){
                            alert_success(data.msg, 'Đăng ký tài khoản', function(){
                                window.location.href = '<?=route('booking.index')?>';
                            });
                        }else{
                            if (data.errors) {
                                $.each(data.errors, function (key, msg) {
                                    $('#'+key+'-error').html(msg).show();
                                });
                            }
                        }
                    });
                }
            })
        })
    </script>
@stop
