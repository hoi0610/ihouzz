@extends('customer::layouts.login-wap')

@section('content')
    <main class="page-login">
        <div class="container">
            <div class="content-login">
                @include('customer::includes.header-login')

                <form id="frm_login" method="POST" action="{{ route('login') }}">
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
                                   placeholder="{{__('customer.phone_input')}}" required autofocus>
                            @if ($errors->has('phone'))
                                <label class="error" for="phone">{{ $errors->first('phone') }}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <i class="fas fa-lock left-icon"></i>
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="{{__('customer.password_input')}}">
                            @if ($errors->has('password'))
                                <label class="error" for="password">{{ $errors->first('password') }}</label>
                            @endif
                            <i class="fas fa-eye right-icon"></i>
                        </div>
                        <button type="submit" class="btn btn-primary">{!! __('customer.login') !!}</button>
                        <a href="{{route('password.forget')}}" class="link-type1">{!! __('customer.forgot_password') !!}</a>
                    </div>
                </form>

                <div class="other-login">
                    <p>{!! __('customer.login_other') !!}</p>
                    <ul class="list-login">
                        <li class="item">
                            <a href="{{route('login.social', ['provider' => 'facebook'])}}">
                                <i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="item">
                            <a href="{{route('login.social', ['provider' => 'google'])}}">
                                <i class="fab fa-google-plus-g"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <p class="fix-bottom">{!! __('customer.not_account', ['link' => route('register.index')]) !!}</p>
        </div>
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
            $('#frm_login').validate({
                ignore: ".ignore",
                rules: {
                    phone: {
                        required: true,
                    },
                    password: "required"
                },
                messages: {
                    phone: "{{__('customer.phone_input')}}",
                    password: "{{__('customer.password_input')}}",
                },
                submitHandler: function(form) {
                    ajax_loading(true);
                    return form.submit();
                }
            });

            setTimeout(function () {
                $( ".alert.alert-warning" ).fadeOut( "slow" );
            }, 5000);
        })
    </script>
@stop
