@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')

    <section class="wp-login">
        <div class="container">
            <div class="wp-login-register">
                <div class="header">
                    <a class="active" href="{{route('login')}}">{{__('customer.login')}}</a>
                    <a href="{{route('register.index')}}">{{__('customer.register')}}</a>
                </div>
                <div class="body">
                    @if(session('register_success'))
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('register_success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(session('change_password_success'))
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('change_password_success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6 ">
                            <form class="frm_login" method="POST" action="{{ route('login') }}" onsubmit="ajax_loading(true)">
                                @csrf
                                <div class="form-login left-border">
                                    <strong class="title">Dành cho khách hàng</strong>
                                    @if(session()->has('message'))
                                        <div class="alert alert-warning" style="text-align: center">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="{{__('customer.phone_input')}}">
                                        @if ($errors->has('phone'))
                                            <label class="error" for="phone">{{ $errors->first('phone') }}</label>
                                        @endif
                                        <span class="icon"><img src="/html/assets/images/icons/user-profile-copy.png" alt=""></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="{{__('customer.password_input')}}">
                                        @if ($errors->has('password'))
                                            <label class="error" for="password">{{ $errors->first('password') }}</label>
                                        @endif
                                        <span class="icon"><img src="/html/assets/images/icons/key.png" alt=""></span>
                                    </div>
                                    <div class="form-group forgot-password" style="width: 100%;">
                                        <div class="checkbox">
                                            <input id="remember_me" name="remember" class="magic-checkbox" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember_me" class="lb-check">{{__('customer.remember_me')}}</label>
                                        </div>
                                        <a class="link" href="{{route('password.forget')}}" title="">{{__('customer.forgot_password')}}</a>
                                    </div>
                                    <button class="btn btn-primary" type="submit">{{__('customer.login')}}</button>
                                    <p class="question">Chưa có tài khoản? <a href="{{route('register.index')}}">Đăng ký</a></p>
                                    <div class="social-login">
                                        <div class="or_">hoặc</div>
                                    </div>
                                    <div class="bottom-login">
                                        <a href="{{route('social.redirect', 'google')}}" class="btn btn-gg social-btn" onclick="ajax_loading(true)">
                                            <span class="icon icon-gg"><img src="/html/assets/images/icons/google.png" alt=""></span>
                                            <span class="text">{{__('customer.login_with_google')}}</span>
                                        </a>
                                        <a href="{{route('social.redirect', 'facebook')}}" class="btn btn-fb social-btn" onclick="ajax_loading(true)">
                                            <span class="icon icon-fb"><img src="/html/assets/images/icons/facebook.png" alt=""></span><span class="text">{{__('customer.login_with_facebook')}}</span>
                                        </a>
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="customer">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="form-login">
                                <strong class="title">Dành cho đối tác</strong>
                                @if(session()->has('message_agent'))
                                    <div class="alert alert-warning" style="text-align: center">
                                        {{ session()->get('message_agent') }}
                                    </div>
                                @endif
                                <form class="frm_login" action="{{ route('login.agent') }}" method="post" onsubmit="ajax_loading(true)">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="agent_phone" class="form-control" placeholder="{{__('customer.phone_input')}}">
                                        @if ($errors->has('agent_phone'))
                                            <label class="error" for="agent_phone">{{ $errors->first('agent_phone') }}</label>
                                        @endif
                                        <span class="icon"><img src="/html/assets/images/icons/user-profile-copy.png" alt=""></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="agent_password" class="form-control" placeholder="{{__('customer.password_input')}}">
                                        @if ($errors->has('agent_password'))
                                            <label class="error" for="agent_password">{{ $errors->first('agent_password') }}</label>
                                        @endif
                                        <span class="icon"><img src="/html/assets/images/icons/key.png" alt=""></span>
                                    </div>
                                    <div class="form-group forgot-password" style="width: 100%;">
                                        <div class="checkbox">
                                            <input id="remember_me" name="remember" class="magic-checkbox" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember_me" class="lb-check">{{__('customer.remember_me')}}</label>
                                        </div>
                                        <a class="link" href="{{route('password.forget')}}" title="">{{__('customer.forgot_password')}}</a>
                                    </div>
                                    <button class="btn btn-primary" type="submit">{{__('customer.login')}}</button>
                                    <p class="question">Chưa có tài khoản? <a href="{{ route('register.index') }}">Đăng ký</a></p>
                                    <input type="hidden" name="type" value="agent">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="about-us-page page-has-banner-top" style="display: none;">
        <!-- end section -->
        <!--begin section-->
        <section class="section_wrapper main-content login-page">
            <div class="container">
                <div class="container-inside">

                    <div class="box-sign-account form-login">
                        <form class="frm_login" method="POST" action="{{ route('login') }}">
                            @csrf
                            @if(session()->has('message'))
                                <div class="alert alert-warning" style="text-align: center">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="phone" class="text lb-email">{{__('customer.phone')}}</label>
                                <input id="phone" type="text" name="phone" class="form-control" placeholder="{{__('customer.phone_input')}}" required autofocus>
                                @if ($errors->has('phone'))
                                    <label class="error" for="phone">{{ $errors->first('phone') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="text password">{{__('customer.password')}}</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="{{__('customer.password_input')}}">
                                @if ($errors->has('password'))
                                    <label class="error" for="password">{{ $errors->first('password') }}</label>
                                @endif
                            </div>
                            <div class="form-group forgot-password">
                                <div class="checkbox">
                                    <input id="remember_me" name="remember" class="magic-checkbox" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember_me" class="lb-check">{{__('customer.remember_me')}}</label>
                                </div>
                                <a class="link" href="{{route('password.forget')}}" title="">{{__('customer.forgot_password')}}</a>
                            </div>
                            <button class="btn btn-secondary" type="submit">{{__('customer.login')}}</button>
                        </form>

                        <div class="social-login">
                            <div class="or_">{{__('customer.login_or')}}</div>
                            <p>{{__('customer.login_with')}}</p>
                        </div>
                        <div class="bottom-login">
                            <a href="{{route('login.social', ['provider' => 'facebook'])}}" class="btn btn-fb social-btn">
                                <span class="icon icon-fb"></span><span class="text">{{__('customer.login_with_facebook')}}</span>
                            </a>
                            <a href="{{route('login.social', ['provider' => 'google'])}}" class="btn btn-gg social-btn">
                                <span class="icon icon-gg"></span><span class="text">{{__('customer.login_with_google')}}</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--end section-->
    </main>
@endsection

@section('after_styles')
    <style>
        .form-group label {
            float: left;
        }
        .form-group label.error {
            float: right;
        }
    </style>
@endsection

@section('after_scripts')
    <script src="/html/assets/js/jquery.validate.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            setTimeout(function () {
                $( ".alert.alert-warning" ).fadeOut( "slow" );
            }, 5000);
        })
    </script>
@stop
