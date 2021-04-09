@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    <div class="list-project-page">
        <livewire:form-search-agent :param="$param"/>
        @if(isset($data))
            @include('includes.breadcrumb', ['breadcrumb' => [
                ['link' => route('agents.index', ['province_id' => $data['province_id']]), 'name' => 'Danh sách đại lý tại ' . $data['province_name']],
                ['link' => route('agents.index', [
                            'province_id' => $data['province_id'],
                            'district_id' => $data['district_id'] ]), 'name' => __($data['district_name'])],
                ['link' => '#', 'name' => __($data['name'])]
            ]])
        @endif

        <section class="detail-agency">
            <div class="container">
                <div class="box-shadow">
                    <h2 class="title">{{$data['name']}}</h2>
                    <div class="detail-info">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="info-agency">
                                    <div class="info-contact">
                                        <div class="wp-img">
                                            <img src="{{$data['image_url'].$data['image_location']}}" alt="">
                                        </div>
                                        <div class="right-content">
                                            <strong class="name">{{$data['name']}}</strong>
                                            <a class="phone-call" href="tel: {{$data['phone']}}">
                                                <img class="color" src="/html/assets/images/icons/phone-call-color.png" alt=""> {{$data['phone']}}
                                            </a>
                                            <p><i class="blue fas fa-map-marker-alt"></i>{{$data['address']}}</p>
                                        </div>
                                    </div>
                                    <div class="text">
                                        {!! $data['description'] !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <form action="" class="send-contact">
                                    <strong>Liên hệ tư vấn</strong>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Họ và tên">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="group-gender">
                                                <div class="radio">
                                                    <input type="radio" name="gender" id="male" checked=""> <label for="male">Nam</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="gender" id="female"> <label for="female">Nữ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Số điện thoại">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <textarea name="" id="" cols="30" rows="5"
                                                      class="form-control" placeholder="Nội dung mong muốn tư vấn"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wp"><button class="btn btn-primary">Gửi liên hệ</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if(!empty($data['pos']))
        <section class="info-trade">
            <div class="container">
                <strong class="title-1">Thông tin sàn giao dịch</strong>
                <div class="row">
                    @foreach($data['pos'] as $pos)
                        <div class="col-md-6">
                            <div class="box-shadow">
                                <div class="info-contact">
                                    <div class="wp-img"><img src="{{ $pos['image_location'] ?? '' }}" alt=""></div>
                                    <div class="right-content">
                                        <strong class="name">{{ $pos['name'] ?? '' }}</strong>
                                        <a class="phone-call" href="tel: {{ $pos['phone'] ?? '' }}"><img class="color"
                                            src="/html/assets/images/icons/phone-call-color.png" alt=""> {{ $pos['phone'] ?? '' }}</a>
                                        <p><i class="blue fas fa-map-marker-alt"></i> {{ $pos['address'] ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="show-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.2358993643143!2d106.7350355148003!3d10.716279692362358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525567b3f2011%3A0xda3280358f3ebfbf!2zMTM0OSBIdeG7s25oIFThuqVuIFBow6F0LCBQaMO6IE3hu7ksIFF14bqtbiA3LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1sen!2s!4v1603977922030!5m2!1sen!2s" width="100%" height="170" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    <span class="show-text-map">Xem bản đồ</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if(!empty($data['employees']))
        <section class="profession">
            <div class="container">
                <strong class="title-1">Chuyên viên môi giới</strong>
                <div class="list-employee">
                    <ul class="row list-employee">
                        @foreach($data['employees'] as $employee)
                            <li class="col-md-4 col-sm-6">
                                <a href="{{ route('chuyen-vien-moi-gioi', $employee['id']) }}" class="item-person">
                                    <div class="wp-img"><img src="{{ $employee['image_location'] }}" alt=""></div>
                                    <div class="info-person">
                                        <strong class="name">{{ $employee['name'] ?? '' }}</strong>
                                        <p class="phone-call"><img class="color" src="/html/assets/images/icons/phone-call-color.png" alt=""> {{ $employee['phone'] ?? '' }}</p>
                                        <p><i class="blue fas fa-map-marker-alt"></i>
                                            @if(isset($employee['district']))
                                                {{ $employee['district']['type'] ?? '' }} {{ $employee['district']['name'] ?? '' }},
                                            @endif
                                            @if(isset($employee['province']))
                                                {{ $employee['province']['type'] ?? '' }} {{ $employee['province']['name'] ?? '' }}
                                            @endif
                                        </p>
                                        <p><i class="fas fa-suitcase blue"></i> {{ $employee['seniority'] ?? '' }} năm kinh nghiệm</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        @endif

        @if(!empty($data['productBookingDone']))
            <section class="sameprice-products">
                <div class="container">
                    <h3 class="title-block">Danh sách giao dịch thành công</h3>
                    <div class="project-list">
                        <div class="row">
                            @foreach($data['productBookingDone'] as $item)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-custom">
                                    <div class="project-item-wrapper">
                                        <a href="{{ route('category.show', $item['id']) }}" class="total-content">
                                            <div class="media-block">
                                                <div class="wrap-img">
                                                    <img src="{{ $item['image_url'] ?? '' }}{{ $item['image'] ?? '' }}" alt="product-image">
                                                </div>
                                                <div class="lb-wrap">
                                                    @if(isset($item['is_hot']) && $item['is_hot'])
                                                        <span class="lb-pj lb-noibat">Nổi bật</span>
                                                    @endif
                                                    @if(isset($item['is_good_price']) && $item['is_good_price'])
                                                        <span class="lb-pj lb-giamgia">Giảm giá</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="content-info-block">
                                                <p class="name tooltip-text" data-toggle="tooltip" data-placement="right"
                                                   title="{!! $item['name'] !!}">{!! $item['name'] !!}</p>
                                                <div class="location">
                                                    <span>
                                                        @if(isset($item['ward_name']) && $item['ward_name'])
                                                            {{ $item['ward_name'] }} ,
                                                        @endif
                                                        @if(isset($item['district_name']) && $item['district_name'])
                                                            {{ $item['district_name'] }} ,
                                                        @endif
                                                        @if(isset($item['province_name']) && $item['province_name'])
                                                            {{ $item['province_name'] }}
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="price">
                                                    <span class="current-price">{{ isset($item['list_price']) ? format_price($item['price']) : '' }}</span>
                                                </div>
                                                <div class="show-info">
                                                    <span class="square icon">
                                                        <img src="/html/assets/images/icons/dt.png" alt="">
                                                        {{ $item['land_area'] ?? '' }} m<sup>2</sup>
                                                    </span>
                                                     <span class="icon bed">
                                                        <img src="/html/assets/images/icons/bed.png" alt="">
                                                        {{ $item['bedroom'] ?? '' }}
                                                    </span>
                                                    <span class="icon bath">
                                                        <img src="/html/assets/images/icons/bath.png" alt="">
                                                        {{ $item['bathroom'] ?? '' }}
                                                    </span>
                                                    @if(isset($item['is_furniture']) && $item['is_furniture'])
                                                        <span class="icon furniture">
                                                            <img src="/html/assets/images/icons/nt.png" alt="">
                                                            Nội thất
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if(!empty($data['productBeManaged']))
            <section class="related-products">
                <div class="container">
                    <h3 class="title-block">Danh sách bất động sản hiện đang quản lý</h3>
                    <div class="project-list">
                        <div class="row">
                            @foreach($data['productBeManaged'] as $item)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-custom">
                                    <div class="project-item-wrapper">
                                        <a href="{{ route('category.show', $item['id']) }}" class="total-content">
                                            <div class="media-block">
                                                <div class="wrap-img">
                                                    <img src="{{ $item['image_url'] ?? '' }}{{ $item['image'] ?? '' }}" alt="product-image">
                                                </div>
                                                <div class="lb-wrap">
                                                    @if(isset($item['is_hot']) && $item['is_hot'])
                                                        <span class="lb-pj lb-noibat">Nổi bật</span>
                                                    @endif
                                                    @if(isset($item['is_good_price']) && $item['is_good_price'])
                                                        <span class="lb-pj lb-giamgia">Giảm giá</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="content-info-block">
                                                <p class="name tooltip-text" data-toggle="tooltip" data-placement="right"
                                                   title="{!! $item['name'] !!}">{!! $item['name'] !!}</p>
                                                <div class="location">
                                                    <span>
                                                        @if(isset($item['ward_name']) && $item['ward_name'])
                                                            {{ $item['ward_name'] }} ,
                                                        @endif
                                                        @if(isset($item['district_name']) && $item['district_name'])
                                                            {{ $item['district_name'] }} ,
                                                        @endif
                                                        @if(isset($item['province_name']) && $item['province_name'])
                                                            {{ $item['province_name'] }}
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="price">
                                                    <span class="current-price">{{ isset($item['list_price']) ? format_price($item['price']) : '' }}</span>
                                                </div>
                                                <div class="show-info">
                                                    <span class="square icon">
                                                        <img src="/html/assets/images/icons/dt.png" alt="">
                                                        {{ $item['land_area'] ?? '' }} m<sup>2</sup>
                                                    </span>
                                                    <span class="icon bed">
                                                        <img src="/html/assets/images/icons/bed.png" alt="">
                                                        {{ $item['bedroom'] ?? '' }}
                                                    </span>
                                                    <span class="icon bath">
                                                        <img src="/html/assets/images/icons/bath.png" alt="">
                                                        {{ $item['bathroom'] ?? '' }}
                                                    </span>
                                                    @if(isset($item['is_furniture']) && $item['is_furniture'])
                                                        <span class="icon furniture">
                                                            <img src="/html/assets/images/icons/nt.png" alt="">
                                                            Nội thất
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection
