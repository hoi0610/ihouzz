@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    <livewire:form-search-agent />
    @if(isset($data))
        @include('includes.breadcrumb', ['breadcrumb' => [
                ['link' => route('agents.index', ['province_id' => $data['province_id']]), 'name' => 'Danh sách đại lý tại ' . $data['province']['name']],
                ['link' => route('agents.index', [
                            'province_id' => $data['province_id'],
                            'district_id' => $data['district_id'] ]), 'name' => __($data['province']['name'])],
                ['link' => route('agents.show', $data['agent_id']), 'name' => __($data['agent']['name'])],
                ['link' => '#', 'name' => 'Chuyên viên ' . __($data['name'])]
            ]])
    @endif
    <section class="detail-agency">
        <div class="container">
            <div class="box-shadow">
                <h2 class="title">Thông tin chuyên viên môi giới</h2>
                <div class="detail-info">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="info-agency">
                                <div class="info-contact">
                                    <div class="wp-img"><img src="{{ $data['image_location'] }}" alt=""></div>
                                    <div class="right-content">
                                        <strong class="name">{{ $data['name'] }}</strong>
                                        <p class="phone-call"><img class="color" src="/html/assets/images/icons/phone-call-color.png" alt=""> {{ $data['phone'] }}</p>
                                        <p><i class="blue fas fa-map-marker-alt"></i>
                                            {{ $data['district']['type'] . ' ' . $data['district']['name'] . ', ' . $data['province']['type'] . ' ' . $data['province']['name'] }}</p>
                                        <p><i class="fas fa-suitcase blue"></i> {{ isset($data['seniority']) ? $data['seniority'] : 0 }} năm kinh nghiệm</p>
                                    </div>
                                </div>
                                <div class="text">{!! $data['introduce'] !!}</div>
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
                                            <img src="{{ $item['image_url'].$item['image'] }}" alt="">
                                        </div>
                                        <div class="lb-wrap">
                                            @if($item['is_hot'] == 1)
                                                <span class="lb-pj lb-noibat">Nổi bật</span>
                                            @endif
                                            @if($item['is_new'] == 1)
                                                <span class="lb-pj lb-giamgia">Giảm giá</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="content-info-block">
                                        <p class="name tooltip-text" data-toggle="tooltip" data-placement="right"
                                           title="{!! $item['name'] !!}">{!! $item['name'] !!}</p>
                                        <div class="location">
                                            <span>{{ $item['ward_name'] }}, {{ $item['district_name'] }}, {{ $item['province_name'] }}</span>
                                        </div>
                                        <div class="price">
                                            <span class="current-price">{{ format_price($item['price']) }}</span>
                                        </div>
                                        <div class="show-info">
                                            <span class="square icon">
                                                <img src="/html/assets/images/icons/dt.png" alt="">
                                                {{ $item['acreage'] }}m2
                                            </span>
                                            <span class="icon bed">
                                                <img src="/html/assets/images/icons/bed.png" alt="">
                                                {{ $item['bedroom'] }}
                                            </span>
                                            <span class="icon bath">
                                                <img src="/html/assets/images/icons/bath.png" alt="">
                                                {{ $item['bathroom'] }}
                                            </span>
                                            @if(isset($data['is_furniture']))
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
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

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
                                                <img src="{{ $item['image_url'].$item['image'] }}" alt="">
                                            </div>
                                            <div class="lb-wrap">
                                                @if($item['is_hot'] == 1)
                                                    <span class="lb-pj lb-noibat">Nổi bật</span>
                                                @endif
                                                @if($item['is_new'] == 1)
                                                    <span class="lb-pj lb-giamgia">Giảm giá</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content-info-block">
                                            <p class="name tooltip-text" data-toggle="tooltip" data-placement="right"
                                               title="{!! $item['name'] !!}">{!! $item['name'] !!}</p>
                                            <div class="location">
                                                <span>{{ $item['ward_name'] }}, {{ $item['district_name'] }}, {{ $item['province_name'] }}</span>
                                            </div>
                                            <div class="price">
                                                <span class="current-price">{{ format_price($item['price']) }}</span>
                                            </div>
                                            <div class="show-info">
                                            <span class="square icon">
                                                <img src="/html/assets/images/icons/dt.png" alt="">
                                                {{ $item['acreage'] }}m2
                                            </span>
                                                <span class="icon bed">
                                                <img src="/html/assets/images/icons/bed.png" alt="">
                                                {{ $item['bedroom'] }}
                                            </span>
                                                <span class="icon bath">
                                                <img src="/html/assets/images/icons/bath.png" alt="">
                                                {{ $item['bathroom'] }}
                                            </span>
                                                @if(isset($data['is_furniture']))
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
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
@endsection
