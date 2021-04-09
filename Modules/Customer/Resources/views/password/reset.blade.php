@extends('customer::layouts.login-wap')

@section('content')
    <main class="page-login register">
        <div class="container">
            <div class="content-login">
                @include('customer::includes.header-login')

                <form id="frm_forget" method="POST" action="">
                    @csrf
                    <div class="form-login">
                        @if(session()->has('message'))
                            <div class="alert alert-warning" style="text-align: center">
                                {{ session()->get('message') }}
                            </div>
                        @endif

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
                                <input type="password" name="password_confirmation" id="re-password" class="form-control" placeholder="{!! __('customer.repassword_input') !!}">
                                <i class="fas fa-eye right-icon"></i>
                                <label id="re-password-error" class="error" for="re-password"></label>
                            </div>

                        <button type="submit" class="btn btn-primary">{!! __('passwords.reset_password') !!}</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@stop

@section('after_styles')
<style type="text/css">
    label.error{
        display: none;
    }
</style>
@stop

@section('after_scripts')
<script type="text/javascript" src="/html/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#frm_forget').validate({
            ignore: ".ignore",
            rules:{
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 6,
                },
                'password_confirmation':{
                    equalTo: "#password"
                }
            },
            messages:{
                'email': {
                    required: '{!! __('customer.email_input') !!}',
                    email: '{!! __('customer.email_input_invalidate') !!}'
                },
                'password': {
                    required: '{!! __('customer.password_input') !!}',
                    minlength: "{!! __('customer.password_input_min') !!}",
                },
                'password_confirmation':{
                    equalTo:'{!! __('customer.repassword_input_not_match') !!}'
                }
            },
            submitHandler: function(form) {
                var data = $(form).serializeArray();
                var url = $(form).attr('action');
                ajax_loading(true);
                $.post(url, data,function(data){
                    ajax_loading(false);
                    if(data.rs){
                        alert_success(data.msg, null, function(){
                            location.href = '<?=route('login.index')?>';
                        });

                    }else{
                        if (data.errors) {
                            $.each(data.errors, function (key, msg) {
                                if($.isArray(msg))
                                    msg = msg[0];

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
