@extends('customer::layouts.login-wap', ['body_class' => 'launching-page'])

@section('content')
    <main class="page-login">
        <div class="container">
            <div class="content-login otp-content">
                @include('customer::includes.header-login')
                <?php
                $user = auth()->user();
                ?>
                <p>{!! __('common.input_otp') !!}</p>
                <strong class="phone">{{$user['phone']??''}}</strong>
                <form id="frm_register" action="" method="post" class="form-horizontal">
                <div class="form-login">
                    <div class="form-group">
                        <input class="form-control" name="otp[0]" type="number">
                        <input class="form-control" name="otp[1]" type="number">
                        <input class="form-control" name="otp[2]" type="number">
                        <input class="form-control" name="otp[3]" type="number">
                        <input class="form-control" name="otp[4]" type="number">
                        <input class="form-control" name="otp[5]" type="number">
                    </div>
                    <p>{!! __('common.not_yet_receiving_otp') !!} <a href="#">{!! __('common.resend') !!}</a></p>
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
            $('#frm_register').validate({
                ignore: ".ignore",
                rules:{
                    'otp[0]': "required",
                    'otp[1]': "required",
                    'otp[2]': "required",
                    'otp[3]': "required",
                    'otp[4]': "required",
                    'otp[5]': "required",
                },
                messages:{},
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
