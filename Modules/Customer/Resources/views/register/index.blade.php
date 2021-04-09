@extends('layouts.main')
<?php
$banners = \App\Models\Banner::getBannerByPage('register-desktop');
$banner = $banners['MAIN_A1'][0] ?? false;
?>
@section('content')
    <main class="about-us-page page-has-banner-top">
        @if ($banner)
            <section class="banner" >
                <a href="{{url($banner['url'])}}"><img src="{{url($banner['image_url'].$banner['image_location'])}}" alt=""></a>
            </section>
        @endif

        <!--begin section-->
        <section class="section_wrapper main-content login-page">
            <div class="container">
                <div class="container-inside">
                    <div class="header-form">
                        <ul class="list-tab">
                            <li><a href="{{route('login')}}">{{__('customer.login')}}</a></li>
                            <li class="active"><a href="{{route('register')}}">{{__('customer.register')}}</a></li>
                        </ul>
                    </div>
                    <div class="box-sign-account">
                        <form id="frm_register" action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="lb-form" for="name">{{__('customer.name')}}: <span class="red">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="{{__('customer.name_input')}}">
                                <label id="name-error" class="error" for="name"></label>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="lb-form" for="birthday">{{__('customer.birthday')}}: </label>
                                        <div class="ip-date">
                                            <input type="text" id="birthday" name="birthday" class="form-control DatePicker"
                                                   value="" placeholder="{{__('customer.birthday_select')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="lb-form" for="">{{__('customer.gender')}}:</label>
                                        <div class="group-gender">
                                            <div class="radio">
                                                <input type="radio" name="gender" id="male" value="male" checked> <label for="male">{{__('customer.gender_male')}}</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="gender" id="female" value="female"> <label for="female">{{__('customer.gender_female')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="lb-form">{{__('customer.phone')}}: <span class="red">*</span></label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="{{__('customer.phone_input')}}">
                                <label id="phone-error" class="error" for="phone"></label>
                            </div>
                            <div class="form-group">
                                <label class="lb-form" for="email">{{__('customer.email')}}: <span class="red">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="{{__('customer.email_input')}}">
                                <label id="email-error" class="error" for="email"></label>
                            </div>
                            <div class="form-group">
                                <label class="lb-form" for="">{{__('customer.password')}}: <span class="red">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{__('customer.password')}}">
                                <label id="password-error" class="error" for="password"></label>
                            </div>
                            <div class="form-group">
                                <label class="lb-form" for="">{{__('customer.repassword')}}: <span class="red">*</span></label>
                                <input type="password" name="re-password" id="re-password" class="form-control" placeholder="{{__('customer.repassword_input')}}">
                                <label id="re-password-error" class="error" for="re-password"></label>
                            </div>
                            <div class="form-group">
                                <div class="checkbox" style="margin-bottom: 0px;">
                                    <input type="checkbox" id="check" name="check" value="1">
                                    <label for="check">{!! __('customer.terms_register', ['app_name' => config('app.name')]) !!}</label>
                                </div>
                                <label id="check-error" class="error" for="check"></label>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-secondary">{{__('customer.register')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--end section-->
        <!--begin section-->
        <?=\App\Helpers\Block::mission();?>
        <!--end section-->
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
                'check': {
                    required: '{{__('customer.terms_register_select')}}'
                },
                'name': {
                    required: '{{__('customer.name_input')}}'
                },
                'phone': {
                    required: '{{__('customer.phone_input')}}',
                    minlength: '{{__('customer.phone_input_min')}}',
                    maxlength: '{{__('customer.phone_input_max')}}',
                },
                'email': {
                    required: '{{__('customer.email_input')}}',
                    email: '{{__('customer.email_input_invalidate')}}'
                },
                'password': {
                    required: '{{__('customer.password_input')}}',
                    minlength: '{{__('customer.password_input_min')}}',
                },
                're-password':{
                    equalTo:'{{__('customer.repassword_input_not_match')}}',
                }
            },
            submitHandler: function(form) {
                var data = $(form).serializeArray();
                var url = $(form).attr('action');
                ajax_loading(true);
                $.post(url, data).done(function(data){
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
