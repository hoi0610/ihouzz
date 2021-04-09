@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    <div>
        <livewire:form-search-category />
        @include('includes.breadcrumb', ['breadcrumb' => [
            ['link' => route(isset($data['product_type_id']) && $data['product_type_id'] == 1 ? 'category.nha-ban' : 'category.nha-thue'), 'name' => isset($data['product_type_id']) && $data['product_type_id'] == 1 ? 'Tìm Nhà Mua Bán' : 'Tìm Nhà Cho Thuê'],
            ['link' => route(isset($data['product_type_id']) && $data['product_type_id'] == 1 ? 'category.nha-ban' : 'category.nha-thue',
                ['province_id' => $data['province_id'] ?? '']), 'name' => __($data['province_name'] ?? '')],
            ['link' => route(isset($data['product_type_id']) && $data['product_type_id'] == 1 ? 'category.nha-ban' : 'category.nha-thue', [
                        'province_id' => $data['province_id'] ?? '',
                        'district_id' => $data['district_id'] ?? ''
                    ]), 'name' => __($data['district_name'] ?? '')],
            ['link' => route(isset($data['product_type_id']) && $data['product_type_id'] == 1 ? 'category.nha-ban' : 'category.nha-thue', [
                        'province_id' => $data['province_id'] ?? '',
                        'district_id' => $data['district_id'] ?? '',
                        'ward_id' => $data['ward_id'] ?? '',
                    ]), 'name' => __($data['ward_name'] ?? '')],
            ['link' => '#', 'name' => __($data['name'] ?? '')]
        ]])

        <section class="detail-project-poverty">
            <div class="container">
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="gallery-images block">
                                <div class="show-one">
                                    <div class="slider-for">
                                        @if(isset($data['images']))
                                            @foreach($product->images as $image)
                                                <div class="item"><img src="{{ $data['image_url'] . $data['images'] }}" alt=""></div>
                                            @endforeach
                                        @else
                                            <div class="item"><img src="/html/assets/images/img/project-detail.png" alt=""></div>
                                        @endif

                                    </div>
                                </div>
                                <div class="choose-one">
                                    <div class="slider-nav">
                                        @if(isset($data['images']))
                                            @foreach($product->images as $image)
                                            <div class="item"><img src="{{ $data['image_url'] . $data['images'] }}" alt=""></div>
                                            @endforeach
                                        @else
                                            <div class="item"><img src="/html/assets/images/img/project-detail.png" alt=""></div>
                                        @endif
                                    </div>
                                    <div class="map-street show-map-act" data-toggle="modal" data-target="#popup-map">
                                        <div class="inside"><img src="/html/assets/images/icons/map.png" alt=""> Street View</div>
                                    </div>
                                </div>
                            </div>

                            <div class="block block-overview">
                                <h3 class="title-block">Thông tin chi tiết</h3>
                                <div class="content">
                                    {!! $data['content'] ?? '' !!}
                                </div>
                            </div>

                            <div class="block block-interior">
                                <h3 class="title-block">Nội thất</h3>
                                <ul class="list-interior row">
                                    @if(isset($data['variants'][0]['data']))
                                        @foreach($data['variants'][0]['data'] as $value)
                                            <li class="col-md-4 col-xs-6">{{ $value['name'] ?? '' }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            @if(isset($data['embed_map']))
                                <x-map-utilities :productId="$data['id']" :map="$data['embed_map']"/>
                            @endif

                            @if(isset($data['product_type_id']) && $data['product_type_id'] == 1)
                                <x-loans-install-ment/>
                            @endif
                            </div>
                            <div class="col-md-3 no-padding-left">
                                <div class="wrap-box">
                                    <div class="item-detail">
                                        <div class="lb-wrap">
                                            @if(isset($data['product_types']['name']) && $data['product_types']['name'])
                                                <span class="lb-pj lb-noibat">{{$data['product_types']['name']}}</span>
                                            @endif
                                            @if(isset($data['product_status']['name']) && $data['product_status']['name'])
                                                <span class="lb-pj lb-giamgia">{{ $data['product_status']['name'] }}</span>
                                            @endif
                                        </div>
                                        <span class="lb_code_id">Mã tin: {{ $data['code'] ?? '' }}</span>
                                        <strong class="title-name">{{ $data['name'] ?? '' }}</strong>
                                        <div class="price">
                                            <span class="current-price">{{ format_price($data['list_price'] ?? 0) }}</span>
                                            <span class="unit">{{ isset($data['price']) ? number_format($data['price'], 0) : '' }} {{ $data['unit_name'] ?? '' }}</span>
                                        </div>
                                        <div class="location">
                                            <span>
                                                @if(isset($data['ward_name']) && $data['ward_name'])
                                                    {{ $data['ward_name'] }},
                                                @endif
                                                @if(isset($data['district_name']) && $data['district_name'])
                                                    {{ $data['district_name'] }},
                                                @endif
                                                @if(isset($data['province_name']) && $data['province_name'])
                                                    {{ $data['province_name'] }}
                                                @endif

                                            </span>
                                        </div>
                                        <div class="show-info">
                                        <span class="square icon">
                                            <img src="/html/assets/images/icons/dt.png" alt="">
                                            {{ $data['land_area'] ?? '0' }} m<sup>2</sup>
                                        </span>
                                            <span class="icon bed">
                                            <img src="/html/assets/images/icons/bed.png" alt="">
                                            {{ $data['bedroom'] ?? '' }}
                                        </span>
                                            <span class="icon bath">
                                            <img src="/html/assets/images/icons/bath.png" alt="">
                                            {{ $data['bathroom'] ?? '' }}
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
                                        <div class="loan-support">
                                            <p>Hỗ trợ cho vay:</p>
                                            <span class="price">~77,44 Triệu <span class="unit">/ Tháng</span></span>
                                            <a href="#" class="view-more">Xem thêm</a>
                                        </div>
                                    </div>

                                    @if(isset($data['is_hide_landlord']) && $data['is_hide_landlord'] != 1)
                                        <div class="item-box">
                                            <div class="personal-part">
                                                <strong>Thông tin đại lý</strong>
                                                <div class="avatar">
                                                    <div class="wrap-img"><img src="{{ $data['landlord_name']['image'] ?? '' }}" alt="agent"></div>
                                                    <div class="info">
                                                        <strong class="name">{{ $data['landlord_name'] ?? '' }}</strong>
                                                        <a class="phone-call" href="tel: {{ $data['landlord_phone'] ?? '' }}"><img class="color" src="/html/assets/images/icons/phone-call-color.png" alt=""> {{ $data['landlord_phone'] ?? '' }}</a>
                                                        <p><i class="blue fas fa-map-marker-alt"></i> {{ $data['landlord_address'] ?? '' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <x-form-register-advisory-and-home-view :productId="request('id')" :projectId="null" />

                                    <div class="box box-district">
                                        @if(session('error_message_favorite'))
                                            <div class="alert alert-danger">{{ session('error_message_favorite') }}</div>
                                        @endif
                                        @if(session('success_message_favorite'))
                                            <div class="alert alert-success">{{ session('success_message_favorite') }}</div>
                                        @endif
                                        <h3 class="title">Mô tả ngắn</h3>
                                        <ul class="list-district">
                                            <li>- Hướng: {{ $data['directions']['name'] ?? '' }}</li>
                                            <li>- Phòng ngủ: {{ $data['bedroom'] ?? '' }}</li>
                                            <li>- Phòng tắm: {{ $data['bathroom'] ?? '' }}</li>
                                            <li>- Hẻm: {{ isset($data['road_width']) ? $data['road_width'] . 'm' : '' }}</li>
                                            <li>- Tầng: {{ isset($data['floor']) ? $data['floor'] : '' }}</li>
                                            <li>- Giấy tờ: {{ $data['legal_documents'] ?? '' }}</li>
                                            <li>- Chiều dài: {{ $data['land_width'] ?? '' }}m</li>
                                            <li>- Chiều rộng: {{ $data['land_length'] ?? '' }}m</li>
                                        </ul>
                                        <div class="button_action" style="display: flex; align-items: center">
                                            @auth('jwt')
                                                @if(!in_array(request('id'), auth('jwt')->getSessionFavorite()))
                                                <form action="{{ route('favorite') }}" method="post" style="display: inline-block">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ request('id') }}">
                                                    <button type="submit" class="btn btn-border" style="font-size: 13px; padding: 5px 10px; margin-right: 5px">
                                                        <i class="fas fa-heart"></i> Lưu tin
                                                    </button>
                                                </form>
                                                @else
                                                    <form action="{{ route('destroy-favorite') }}" method="post" style="display: inline-block">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ request('id') }}">
                                                        <button type="submit" class="btn btn-border" style="font-size: 13px; padding: 5px 10px; margin-right: 5px">
                                                            <i class="fas fa-heart"></i> Hủy lưu tin
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth
                                            <div id="popoverOpener" style="margin-right: 5px">
                                                <button type="button" class="btn btn-border" style="font-size: 13px">
                                                    <i class="fas fa-share-square"></i> Chia sẻ
                                                </button>
                                            </div>
                                            <div id="popoverWrapper" style="position: relative">
                                                <div class="popover" role="tooltip">
                                                    <div class="arrow"></div>
                                                    <div class="popover-content" style="width: 200px; padding: 5px 15px">
                                                        <ul class="list-social">
                                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"><img src="/html/assets/images/fb.png" alt=""></a></li>
                                                            <li><a href="http://twitter.com/share?text=Im Sharing on Twitter&url={{ url()->current() }}&hashtags=nhadat,datxanh" target="_blank"><img src="/html/assets/images/twt.png" alt=""></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="location" data-toggle="modal" data-target="#popup-map" style="padding: 6px 16px; margin-bottom: 0">
                                                <img src="/html/assets/images/icons/location.png" alt="" style="width: 11px;">
                                            </span>
                                        </div>
                                    </div>

                                    @if($dataSameStreet)
                                        <x-product-same-street-nav-right :data="$dataSameStreet"/>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="section">
                @if(session('success_message'))
                    <input class="modal-btn" type="checkbox" id="modal-btn" name="modal-btn"/>
                    <label for="modal-btn"></label>
                    <div class="modal">
                        <div class="modal-wrap">
                            <h3 style="color: green; font-weight: bold; padding: 10px 20px">Chúc mừng!</h3>
                            <hr>
                            <p>{{ session('success_message') }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- The Modal map-->
            <div class="modal" id="popup-map">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- Modal body -->
                        <div class="modal-body">
                            {!! $data['embed_map'] ?? '' !!}
                        </div>

                    </div>
                </div>
            </div>
            <!--end modal-->

            @if($dataSameStreet)
                <x-product-same-street-list :data="$dataSameStreet"/>
            @endif

            @if(!empty($dataSamePrice))
                <section class="related-products">
                    <div class="container">
                        <h3 class="title-block">Nhà riêng cho thuê cùng tầm giá</h3>
                        <div class="project-list">
                            <div class="row">
                                @foreach($dataSamePrice as $item)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-custom">
                                        <div class="project-item-wrapper">
                                            <a href="{{ route('category.show', $item['id']) }}" class="total-content">
                                                <div class="media-block">
                                                    <div class="wrap-img">
                                                        <img src="{{ $item['image'] ? $item['image_url']. $item['image'] :  '' }}" alt="">
                                                    </div>

                                                </div>
                                                <div class="content-info-block">
                                                    <p class="name tooltip-text" data-toggle="tooltip" data-placement="right"
                                                       title="{!! $item['name'] !!}">{!! $item['name'] !!}</p>
                                                    <div class="location">
                                            <span>
                                                @if(isset($item['ward_name']))
                                                    {{ $item['ward_name'] }},
                                                @endif
                                                @if(isset($item['district_name']))
                                                    {{ $item['district_name'] }},
                                                @endif
                                                @if(isset($item['province_name']))
                                                    {{ $item['province_name'] }}
                                                @endif
                                            </span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="current-price">{{ format_price($item['list_price'] ?? '') }}</span>
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
                                                        @if($item['is_furniture'])
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
            @endif

        </div>
    @endsection

@section('after_styles')
    <style>
        .bootstrap .popover {
            transition: left 400ms ease-out, top 250ms ease-in;
        }

        .popover-content > div {
            text-align: center;
        }

        .popover-content > div > a:link {
            border: 1px solid lavender;
            border-radius: 8px;
            display: inline-block;
            padding: 4px;
            text-decoration: none;
            transition: all 250ms;
        }

        .popover-content > div > a:hover {
            background-color: #eeeeff;
            border-color: #AFAFBF;
            border-radius: 4px;
            box-shadow: 0 0 4px #ccc;
        }
        .section{
            position: relative;
            width: 100%;
            display: block;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .full-height{
            min-height: 100vh;
        }

        [type="checkbox"]:checked,
        [type="checkbox"]:not(:checked){
            position: absolute;
            left: -9999px;
        }
        .section .modal-btn:checked + label,
        .section .modal-btn:not(:checked) + label{
            position: relative;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 15px;
            line-height: 2;
            transition: all 200ms linear;
            border-radius: 4px;
            letter-spacing: 1px;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -moz-align-items: center;
            -ms-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            -moz-justify-content: center;
            -ms-justify-content: center;
            justify-content: center;
            -ms-flex-pack: center;
            text-align: center;
            -ms-flex-item-align: center;
            align-self: center;
            border: none;
            cursor: pointer;
            background-color: #102770;
            color: #ffeba7;
            box-shadow: 0 12px 35px 0 rgba(16,39,112,.25);
        }
        .section .modal-btn:not(:checked) + label:hover{
            background-color: #ffeba7;
            color: #102770;
        }
        .section .modal-btn:checked + label .uil,
        .section .modal-btn:not(:checked) + label .uil{
            margin-left: 10px;
            font-size: 18px;
        }
        .section .modal-btn:checked + label:after,
        .section .modal-btn:not(:checked) + label:after{
            position: fixed;
            top: 100px;
            right: 30px;
            z-index: 110;
            width: 40px;
            border-radius: 3px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-size: 18px;
            background-color: #ffeba7;
            color: #102770;
            content: 'x';
            box-shadow: 0 12px 25px 0 rgba(16,39,112,.25);
            transition: all 200ms linear;
            opacity: 1;
            pointer-events: auto;
            transform: translateY(20px);
        }
        .section .modal-btn:checked + label:hover:after,
        .section .modal-btn:not(:checked) + label:hover:after{
            background-color: #102770;
            color: #ffeba7;
        }
        .section .modal-btn:checked + label:after{
            transition: opacity 300ms 300ms ease, transform 300ms 300ms ease, background-color 250ms linear, color 250ms linear;
            display: none;
            pointer-events: auto;
            transform: translateY(0);
        }
        .section .modal{
            position: fixed;
            display: block;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
            margin: 0 auto;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            overflow-x: hidden;
            background-color: rgba(31,32,41,.75);
            pointer-events: none;
            opacity: 1;
            transition: opacity 250ms 700ms ease;
        }
        .section .modal-btn:checked ~ .modal{
            pointer-events: auto;
            display: none;
            transition: all 300ms ease-in-out;
        }
        .section .modal-wrap {
            position: relative;
            display: block;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 4px;
            overflow: hidden;
            padding-bottom: 20px;
            background-color: #fff;
            -ms-flex-item-align: center;
            align-self: center;
            box-shadow: 0 12px 25px 0 rgba(199,175,189,.25);
            opacity: 1;
            transform: scale(1);
            transition: opacity 250ms 250ms ease, transform 300ms 250ms ease;
        }
        .section .modal-wrap img {
            display: block;
            width: 100%;
            height: auto;
        }
        .section .modal-wrap p {
            padding: 20px 30px 0 30px;
        }
        .section .modal-btn:checked ~ .modal .modal-wrap{
            opacity: 1;
            transform: scale(1);
            transition: opacity 250ms 500ms ease, transform 350ms 500ms ease;
        }


        .logo {
            position: absolute;
            top: 25px;
            left: 25px;
            display: block;
            z-index: 1000;
            transition: all 250ms linear;
        }
        .logo img {
            height: 26px;
            width: auto;
            display: block;
            filter: brightness(10%);
            transition: filter 250ms 700ms linear;
        }
        .section .modal-btn:checked ~ .logo img {
            filter: brightness(100%);
            transition: all 250ms linear;
        }


        @media screen and (max-width: 500px) {
            .section .modal-wrap {
                width: calc(100% - 40px);
                padding-bottom: 15px;
            }
            .section .modal-wrap p {
                padding: 15px 20px 0 20px;
            }
        }
    </style>
@endsection
@section('after_scripts')
    <script>

        data = requestApi('products/{{ request('id') }}', {});
    </script>
    <script>
        'use strict';
        class Popover {
            constructor(element, trigger, options) {
                this.options = { // defaults
                    position: Popover.BOTTOM
                };
                this.element = element;
                this.trigger = trigger;
                this._isOpen = false;
                Object.assign(this.options, options);
                this.events();
                this.initialPosition();
            }

            events() {
                this.trigger.addEventListener('click', this.toggle.bind(this));
            }

            initialPosition() {
                let triggerRect = this.trigger.getBoundingClientRect();
                this.element.style.top = ~~triggerRect.top + 'px';
                this.element.style.left = ~~triggerRect.left + 'px';
            }

            toggle(e) {
                e.stopPropagation();
                if (this._isOpen) {
                    this.close(e);
                } else {
                    this.element.style.display = 'block';
                    this._isOpen = true;
                    this.outsideClick();
                    this.position();
                }
            }

            targetIsInsideElement(e) {
                let target = e.target;
                if (target) {
                    do {
                        if (target === this.element) {
                            return true;
                        }
                    } while (target = target.parentNode);
                }
                return false;
            }

            close(e) {
                if (!this.targetIsInsideElement(e)) {
                    this.element.style.display = 'none';
                    this._isOpen = false;
                    this.killOutSideClick();
                }
            }

            position(overridePosition) {
                let triggerRect = this.trigger.getBoundingClientRect(),
                    elementRect = this.element.getBoundingClientRect(),
                    position = overridePosition || this.options.position;
                this.element.classList.remove(Popover.TOP, Popover.BOTTOM, Popover.LEFT, Popover.RIGHT); // remove all possible values
                this.element.classList.add(position);
                this.element.style.top = '-77px';
                this.element.style.left = '-155px';
            }

            outsideClick() {
                document.addEventListener('click', this.close.bind(this));
            }

            killOutSideClick() {
                document.removeEventListener('click', this.close.bind(this));
            }

            isOpen() {
                return this._isOpen;
            }
        }

        Popover.TOP = 'top';
        Popover.RIGHT = 'right';
        Popover.BOTTOM = 'bottom';
        Popover.LEFT = 'left';

        document.addEventListener('DOMContentLoaded', function() {
            let btn = document.querySelector('#popoverOpener button'),
                template = document.querySelector('.popover'),
                pop = new Popover(template, btn, {
                    position: Popover.TOP
                })
        });
    </script>
@endsection
