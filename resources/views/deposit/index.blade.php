@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    @include('includes.breadcrumb', ['breadcrumb' => [
            ['link' => route('home.index'), 'name' => 'IHouzz'],
            ['link' => '#', 'name' => 'Ký gửi bất động sản'],
        ]])

    @include('includes.option')

    <section class="banner-bds">
        <div class="container"><img src="/html/assets/images/banner-kygui.png" alt=""></div>
    </section>

    <section class="info-kygui">
        <div class="container">
            <h3 class="title-block">Ký gửi bất động sản</h3>
            @if(session('message_error'))
                <ul class="alert alert-danger">
                    @foreach(session('message_error') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="radio-toolbar">
                    @foreach(\App\Facade\ApiSetting::listOwnerTypeProperty([])['data'] as $key => $type)
                        <input type="radio" id="radioPersonal-{{$key}}" name="type" value="{{ $key }}" @if($loop->first) checked @endif>
                        <label for="radioPersonal-{{ $key }}">{{ $type }}</label>
                    @endforeach
                </div>
                <div class="content-info-kygui">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-shadow">
                                <strong class="title">Thông tin cá nhân</strong>
                                <div class="form-group">
                                    <label for="">Tên khách hàng <span class="red">*</span></label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Nhập tên khách hàng"
                                        value="{{ old('name') ?? '' }}"
                                    >
                                    @error('name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại <span class="red">*</span></label>
                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        placeholder="Nhập số điện thoại"
                                        value="{{ old('phone') ?? '' }}"
                                    >
                                    @error('phone')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email <span class="red">*</span></label>
                                    <input
                                        type="text"
                                        name="email"
                                        class="form-control"
                                        placeholder="Nhập địa chỉ Email"
                                        value="{{ old('email') ?? '' }}"
                                    >
                                    @error('email')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="box-shadow form-custom">
                                <strong class="title">Thông tin ký gửi</strong>
                                <div class="row" >
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-3">Loại hình giao dịch <span class="red">*</span></label>
                                            <div class="group-gender">
                                                @foreach(\App\Facade\ApiSetting::listProductTypes([])['data'] as $key => $type)
                                                    <div class="radio">
                                                        <input
                                                            type="radio"
                                                            name="product_type_id"
                                                            id="type-{{ $key }}"
                                                            value="{{ $type['id'] ?? '' }}"
                                                            @if(old('product_type_id') == $type['id']) checked @endif
                                                        />
                                                        <label for="type-{{ $key }}" style="font-weight: normal">{{ $type['name'] ?? '' }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @error('product_type_id')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-3">Loại bất động sản <span class="red">*</span></label>
                                            <div style="display: grid; grid-column-gap: 20px; grid-row-gap: 20px; grid-template-columns: 1fr 1fr">
                                                @foreach(\App\Facade\ApiSetting::listProductCategories([])['data'] as $key => $category)
                                                    <div class="radio">
                                                        <input
                                                            type="radio"
                                                            name="product_category_id"
                                                            id="category-{{ $key }}"
                                                            value="{{ $category['id'] }}"
                                                            @if(old('product_category_id') == $category['id']) checked @endif
                                                        />
                                                        <label for="category-{{ $key }}" style="font-weight: normal">{{ $category['name'] ?? '' }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @error('product_category_id')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Giá đề nghị <span class="red">*</span></label>
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            name="price"
                                            class="form-control"
                                            placeholder="Nhập giá đề nghị"
                                            value="{{ old('price') ?? '' }}"
                                        />
                                        <span class="input-group-btn">
                                            <button class="btn btn-mint" type="button">Tháng</button>
                                        </span>
                                    </div>
                                    @error('price')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <livewire:select-address-form-consignment />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class=" box-shadow box-upload-img">
                        <strong class="title">Chi tiết sản phẩm ký gửi</strong>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Hình ảnh nhà <span class="red">*</span></label>
                                <div class="note">(upload tối thiểu 2 hình, kéo thả file hoặc chọn trực tiếp từ máy tính, dung lượng từ 600Kb -> 1Mb, kích thước tối thiểu với ảnh ngang 1714x968, ảnh đứng 958x1714)</div>

                                <livewire:upload-home-image />
                                @error('home_images')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                                @error('home_images.*')
                                <div style="color: red">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Nhập mô tả"
                                        name="description"
                                        value="{{ old('description') ?? '' }}"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="block">
                                    <label for="">Bản vẽ/ số <span class="red">*</span></label>
                                    <div class="note">(upload tối thiểu 4 hình, kéo thả file hoặc chọn trực tiếp từ máy tính, dung lượng từ 600Kb -> 1Mb, kích thước tối thiểu với ảnh ngang 1714x968, ảnh đứng 958x1714)</div>

                                    <livewire:upload-drawing-image />
                                    @error('drawing_images')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                    @error('drawing_images.*')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="block">
                                    <label for="">Nhu cầu khác</label>
                                    @foreach(\App\Facade\ApiSetting::listOtherNeedsProperty([])['data'] as $key => $value)
                                        <div class="checkbox">
                                            <input
                                                id="other-need-{{ $key }}"
                                                type="checkbox"
                                                name="other_needs[]"
                                                value="{{ $value }}"
                                            />
                                            <label for="other-need-{{ $key }}">{{ $value }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <input
                                id="check4"
                                type="checkbox"
                                name="agree"
                                @if(old('agree')) checked @endif
                            >
                            <label for="check4">Tôi đồng ý với điều khoản sử dụng và biểu phí giao dịch <span class="red">*</span></label>
                        </div>
                        @error('agree')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="wrap-btn"><button type="submit" class="btn btn-primary">Gửi thông tin</button></div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('after_styles')
    <style>
        .radio-toolbar {
            margin-bottom: 20px;
        }

        .radio-toolbar input[type="radio"] {
            opacity: 0;
            position: fixed;
            width: 0;
        }

        .radio-toolbar label {
            display: inline-block;
            background-color: #ddd;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: normal;
            font-size: 13px;
            cursor: pointer;
            margin-right: 20px;
        }

        .radio-toolbar label:hover {
            background-color: #0061ff;
            color: #ffffff;
        }

        .radio-toolbar input[type="radio"]:checked + label {
            background-color: #0061ff;
            color: #ffffff;
        }

    </style>
@endsection



