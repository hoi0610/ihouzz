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
                    <a href="{{ route('login') }}">Đăng nhập</a>
                    <a href="{{ route('register.index') }}" class="active">Đăng ký</a>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('register.customer') }}" method="post">
                                @csrf
                                <div class="form-login left-border">
                                    <strong class="title">Dành cho khách hàng</strong>
                                    @if(session('error_message_customer'))
                                        <ul class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @foreach(session('error_message_customer') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="top: 50%; transform: translateY(-50%); right: 10px; padding: 0">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </ul>
                                    @endif
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            placeholder="Họ và tên"
                                            value="{{ old('name') ?? '' }}"
                                            @error('name') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/user-profile-copy.png') }}" alt=""></span>
                                        @error('name') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="phone"
                                            class="form-control"
                                            placeholder="Số điện thoại"
                                            value="{{ old('phone') ?? '' }}"
                                            @error('phone') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/telephone-dark.png') }}" alt=""></span>
                                        @error('phone') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="email"
                                            class="form-control"
                                            placeholder="Email"
                                            value="{{ old('email') ?? '' }}"
                                            @error('email') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/email.png') }}" alt=""></span>
                                        @error('email') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="password"
                                            name="password"
                                            class="form-control"
                                            placeholder="Mật khẩu"
                                            @error('password') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/key.png') }}" alt=""></span>
                                        @error('password') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            class="form-control"
                                            placeholder="Nhập lại mật khẩu"
                                            @error('password_confirmation') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/key.png') }}" alt=""></span>
                                        @error('password_confirmation') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary" >Đăng ký</button>
                                    <p class="question">Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('register.agent') }}" method="post">
                                @csrf
                                <div class="form-login">
                                    <strong class="title">Dành cho đối tác</strong>
                                    @if(session('error_message_agent'))
                                        <ul class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @foreach(session('error_message_agent') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="top: 50%; transform: translateY(-50%); right: 10px; padding: 0">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </ul>
                                    @endif
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="fullname"
                                            class="form-control"
                                            placeholder="Họ và tên"
                                            value="{{ old('fullname') ?? '' }}"
                                            @error('fullname') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/user-profile-copy.png') }}" alt=""></span>
                                        @error('fullname') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="agent_phone"
                                            class="form-control"
                                            placeholder="Số điện thoại"
                                            value="{{ old('agent_phone') ?? '' }}"
                                            @error('agent_phone') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/telephone-dark.png') }}" alt=""></span>
                                        @error('agent_phone') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="agent_email"
                                            class="form-control"
                                            placeholder="Email"
                                            value="{{ old('agent_email') ?? '' }}"
                                            @error('agent_email') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/email.png') }}" alt=""></span>
                                        @error('agent_email') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="password"
                                            name="agent_password"
                                            class="form-control"
                                            placeholder="Mật khẩu"
                                            @error('agent_password') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/key.png') }}" alt=""></span>
                                        @error('agent_password') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="password"
                                            name="agent_password_confirmation"
                                            class="form-control"
                                            placeholder="Nhập lại mật khẩu"
                                            @error('agent_password_confirmation') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/key.png') }}" alt=""></span>
                                        @error('agent_password_confirmation') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="agent_name"
                                            class="form-control"
                                            placeholder="Tên đại lý môi giới"
                                            value="{{ old('agent_name') ?? '' }}"
                                            @error('agent_name') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/agenda.png') }}" alt=""></span>
                                        @error('agent_name') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="employees_number"
                                            class="form-control"
                                            placeholder="Số lượng nhân viên hiện có"
                                            value="{{ old('employees_number') ?? '' }}"
                                            @error('employees_number') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/user-group.png') }}" alt=""></span>
                                        @error('employees_number') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="company_name"
                                            class="form-control"
                                            placeholder="Tên công ty (nếu có)"
                                            value="{{ old('company_name') ?? '' }}"
                                            @error('company_name') style="border-color: red" @enderror
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/id-card.png') }}" alt=""></span>
                                        @error('company_name') <span style="color: red">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="tax_code"
                                            class="form-control"
                                            placeholder="Mã số thuế"
                                            value="{{ old('tax_code') ?? '' }}"
                                        >
                                        <span class="icon"><img src="{{ asset('html/assets/images/icons/barcode.png') }}" alt=""></span>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="address"
                                            class="form-control"
                                            placeholder="Địa chỉ"
                                            value="{{ old('address') ?? '' }}"
                                        >
                                        <span class="icon"><img src="{{ asset('/html/assets/images/icons/address.png') }}" alt=""></span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                    <p class="question">Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

