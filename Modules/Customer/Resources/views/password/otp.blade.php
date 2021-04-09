@extends('customer::layouts.login-wap', ['body_class' => 'launching-page'])

@section('content')
    <main class="page-login">
        <div class="container">
            <div class="content-login otp-content">
                @include('customer::includes.header-login')
                <p>{!! __('common.input_otp') !!}</p>
                <strong class="phone">{{$phone ?? ''}}</strong>
                <form id="frm_register" action="" method="post" class="form-horizontal">
                    <div class="form-login">
                        <div class="form-group">
                            <input class="form-control inputs" name="otp[0]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[1]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[2]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[3]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[4]" type="number" maxlength="1">
                            <input class="form-control inputs" name="otp[5]" type="number" maxlength="1">
                        </div>
                        <p>{!! __('common.not_yet_receiving_otp') !!} <a href="#" class="btn-resend-otp">{!! __('common.resend') !!}</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary">{!! __('common.continue') !!}</button>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('after_styles')
    <style type="text/css">
        label.error {
            display: none!important;
        }
    </style>
@stop

@section('after_scripts')
    <script type="text/javascript" src="/html/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.btn-resend-otp').on('click', function () {
                ajax_loading(true);
                $.post('{{route('password.resend-otp')}}').done(function(data) {
                    ajax_loading(false);
                    if(data.msg){
                        alert_success(data.msg);
                    }
                });
            });
            $('#frm_register').validate({
                ignore: ".ignore",
                rules:{},
                messages:{},
                submitHandler: function(form) {
                    var flag = 0;
                    $('.form-control.inputs').each(function( index ) {
                        if($( this ).text()=='') {
                            $( this ).focus();
                            flag = 1;
                            return false;
                        }
                    });
                    if (flag) {
                        return false;
                    }

                    var data = $(form).serializeArray();
                    var url = $(form).attr('action');
                    ajax_loading(true);
                    $.post(url, data).done(function(data) {
                        ajax_loading(false);
                        if(data.rs){
                            alert_success(data.msg, 'Xác thực OTP', function(){
                                window.location.href = data.url;
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
