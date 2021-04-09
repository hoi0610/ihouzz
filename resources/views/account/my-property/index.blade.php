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
                            <h4 class="title">Bất động sản của tôi</h4>
                            <p>Hiện có <span class="blue">{{ $data['total'] }}</span> bất động sản nào được tạo</p>
                        </div>
                        <div class="body">
                            @foreach($data['data'] as $item)
                            <div class="project-item-horizontal">
                                <div class="media-block">
                                    <a href="{{route('category.show', $item['id'])}}">
                                        <div class="wrap-img">
                                            <img src="{{$item['image_url'] . $item['image']}}" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="content-info-block">
                                    <a href="{{route('category.show', $item['id'])}}" class="name">{{ $item['name'] }}</a>
                                    <div class="location-account">
                                        @php
                                            $location = [];
                                            if (isset($item['ward_name'])) {
                                                array_push($location, $item['ward_name']);
                                            }
                                            if (isset($item['district_name'])) {
                                                array_push($location, $item['district_name']);
                                            }
                                            if (isset($item['province_name'])) {
                                                array_push($location, $item['province_name']);
                                            }
                                        @endphp
                                        <span>{{ implode(", ", $location) }}</span>
                                    </div>
                                    <div class="price">
                                        <span class="current-price">{{ format_price($item['price']) }}</span>
                                    </div>
                                    <div class="line-bottom">
                                        <div class="show-info">
                                            <span class="square icon">
                                                <img src="{{ asset('html/assets/images/icons/dt.png') }}" alt="">
                                                {{ $item['acreage'] }}m2
                                            </span>
                                            <span class="icon bed">
                                                <img src="{{ asset('html/assets/images/icons/bed.png') }}" alt="">
                                                {{ $item['bedroom'] }}
                                            </span>
                                            <span class="icon bath">
                                                <img src="{{ asset('html/assets/images/icons/bath.png') }}" alt="">
                                                {{ $item['bathroom'] }}
                                            </span>
                                            @if(isset($item['is_furniture']))
                                                <span class="icon furniture">
                                                    <img src="/html/assets/images/icons/nt.png" alt="">
                                                    Nội thất
                                                </span>
                                            @else
                                                <span class="icon furniture">
                                                    <i class="fas fa-times-circle"></i>
                                                    Nội thất
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
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
