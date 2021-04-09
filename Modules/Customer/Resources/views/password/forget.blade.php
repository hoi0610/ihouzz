@extends('customer::layouts.login-wap')

@section('content')
    <main class="page-login">
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
                            <i class="fas fa-user-alt left-icon"></i>
                            <input id="phone" name="phone" type="text" class="form-control"
                                   placeholder="{{__('customer.phone_email_input')}}" required autofocus>
                            @if ($errors->has('phone'))
                                <label class="error" for="phone">{{ $errors->first('phone') }}</label>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">{!! __('passwords.retrieval') !!}</button>
                    </div>
                </form>
            </div>

            <p class="fix-bottom">{!! __('customer.have_account', ['link' => route('login')]) !!}
                <br>
                <br>
                {!! __('customer.not_account', ['link' => route('register.index')]) !!}</p>
        </div>
    </main>
@stop
@section('after_styles')
<style type="text/css">
    label.error{
        display: none!important;
    }
</style>
@stop
@section('after_scripts')
<script type="text/javascript" src="/html/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#frm_forget').validate({
            submitHandler: function(form) {
                var data = $(form).serializeArray();
                var url = $(form).attr('action');
                ajax_loading(true);
                $.post(url, data, function(data) {
                    ajax_loading(false);
                    if(data.rs){
                        if (data.url) {
                            location.href = data.url;
                            return;
                        }
                        alert_success(data.msg);
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
