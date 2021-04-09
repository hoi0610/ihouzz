@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    @include('includes.option')

    @if(isset($data))
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('du-an'), 'name' => 'Dự án'],
        ['link' => route('du-an', ['province_id' => $data['province_id'] ?? '']), 'name' => __($data['province_name']  ?? '')],
        ['link' => route('du-an', [
                    'province_id' => $data['province_id'] ?? '',
                    'district_id' => $data['district_id'] ?? ''
                ]), 'name' => __($data['district_name'] ?? '')],
        ['link' => route('du-an', [
                    'province_id' => $data['province_id'] ?? '',
                    'district_id' => $data['district_id'] ?? '',
                    'ward_id' => $data['ward_id'] ?? '',
                ]), 'name' => __($data['ward_name'] ?? '')],
        ['link' => route('du-an.detail', $data['id'] ?? ''), 'name' => __($data['name'] ?? '')]
    ]])
    @endif

    <section class="detail-project-poverty">
        <div class="container">
            <div class="main-content">
                <div class="top-header-title">
                    <div class="left-title">
                        <h3 class="title-block">{{ $data['name'] ?? '' }}</h3>
                        <div class="location">
                            <i class="fas fa-map-marker-alt blue"></i>

                            @if(isset($data['street']['name']))
                                {{ $data['street']['name'] }},
                            @endif
                            @if(isset($data['ward_name']))
                                {{ $data['ward_name'] }},
                            @endif
                            @if(isset($data['district_name']))
                                {{ $data['district_name'] }},
                            @endif
                            @if(isset($data['province_name']))
                                {{ $data['province_name'] }}
                            @endif
                        </div>
                        <div class="line-bottom">
                            <div class="show-info">
                                <span class=" icon">
                                    <img src="/html/assets/images/icons/business-and-trade.png" alt="">
                                    {{ $data['building'] ?? '' }} Block
                                </span>
                                <span class="icon ">
                                    <img src="/html/assets/images/icons/assembly-area.png" alt="">
                                    {{ $data['apartment'] ?? '' }} căn hộ
                                </span>
                                <span class="icon">
                                    <img src="/html/assets/images/icons/dollar.png" alt="">
                                    {{ $data['price_square_meters'] ?? '' }} / m<sup>2</sup>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="button_action" style="display: flex; align-items: center">
                        <div id="popoverOpener" style="font-size: 13px; margin-right: 10px">
                            <button type="button" class="btn btn-border" >
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

                <div class="toolbar-wp">
                    <div class="place-slide" style="width: 100%;">
                        <ul class="list-place-slide" style="max-width: 100%">
                            <li class="item"><a class="active" href="javascript:void(0)" data-element_id="block-interior">Tổng quan</a></li>
                            <li class="item"><a href="javascript:void(0)" data-element_id="block-overview">Giới thiệu</a></li>
                            <li class="item"><a href="javascript:void(0)" data-element_id="block-location">Vị trí</a></li>
                            <li class="item"><a href="javascript:void(0)" data-element_id="block-matbang">Mặt bằng</a></li>
                            <li class="item"><a href="javascript:void(0)" data-element_id="block-infrastructure">Cơ sở vật chất</a></li>
                            <li class="item"><a href="javascript:void(0)" data-element_id="block-utilities">Tiện ích</a></li>
                            <li class="item"><a href="javascript:void(0)" data-element_id="block-owner">Chủ đầu tư</a></li>
                            <li class="item"><a href="javascript:void(0)" data-element_id="block-interior">Tính toán lãi vay</a></li>
                            <li class="item"><a href="javascript:void(0)" data-element_id="block-interior">Sản phẩm của dự án</a></li>
                        </ul>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="gallery-images block">
                            <div class="show-one show-img-large">
                                <div class="slider-for-pj-detail">
                                    @if(!empty($data['image_details']))
                                        @foreach($data['image_details'] as $image)
                                            <div class="item">
                                                <img src="{{ $image['image_url'] ?? '' }}{{ $image['image'] ?? '' }}" alt="anh-du-an">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="gallery">
                                    <img src="/html/assets/images/icons/gallery.png" alt="">
                                    <span>{{ isset($data['image_details']) ? count($data['image_details']) : 0 }}</span>
                                </div>
                            </div>
                            <div class="choose-one">
                                <div class="slider-nav-pj-detail">
                                    @if(!empty($data['image_details']))
                                        @foreach($data['image_details'] as $image)
                                            <div class="item">
                                                <img src="{{ $image['image_url'] ?? '' }}{{ $image['image'] ?? '' }}" alt="anh-du-an">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="block block-interior" id="block-interior">
                            {!! $data['overview'] ?? '' !!}
                        </div>

                        <div class="block block-overview" id="block-overview">
                            {!! $data['introduce'] ?? '' !!}
                        </div>

                        <div class="block block-location" id="block-location">
                            {!! $data['location'] ?? '' !!}
                        </div>

                        <div class="block block-matbang" id="block-matbang">
                            <h3 class="title-block">Mặt bằng tổng thể</h3>
                            <div class="content">
                                <div class="gallery-images block">
                                    <div class="show-one">
                                        <div class="slider-for-mb">
                                            @if(!empty($data['image_ground']))
                                                @foreach($data['image_ground'] as $item)
                                                    <div class="item">
                                                        <img src="{{ $item['image_url'] ?? '' }}{{ $item['image'] ?? '' }}" alt="mat-bang-tong-the-du-an">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="choose-one">
                                        <div class="slider-nav-mb">
                                            @if(!empty($data['image_ground']))
                                                @foreach($data['image_ground'] as $item)
                                                    <div class="item">
                                                        <img src="{{ $item['image_url'] ?? '' }}{{ $item['image'] ?? '' }}" alt="mat-bang-tong-the-du-an">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="block block-interior" id="block-infrastructure">
                            <h3 class="title-block">Cơ sở vật chất</h3>
                            <ul class="list-interior row">
                                @if(!empty($data['infrastructures']))
                                    @foreach($data['infrastructures'] as $item)
                                        <li class="col-md-4 col-xs-6">{{ $item['name'] ?? '' }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        @if(isset($data['embed_map']))
                            <x-map-utilities :productId="$data['id']" :map="$data['embed_map']"/>
                        @endif

                        <div class="block block-owner" id="block-owner">
                            {!! $data['investor'] ?? '' !!}
                        </div>
                    </div>
                    <div class="col-md-3 no-padding-left">
                        <div class="wrap-box">
                            <x-form-register-advisory-and-home-view :productId="null" :projectId="request('id')" />

                            <a href="#" class="banner-box">
                                <img src="/html/assets/images/banner-box1.png" alt="">
                            </a>
                            <a href="#" class="banner-box">
                                <img src="/html/assets/images/banner-box2.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The Modal map-->
    <div class="modal" id="popup-map">
        <div class="modal-dialog">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- Modal body -->
                <div class="modal-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.2358993643143!2d106.7350355148003!3d10.716279692362358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525567b3f2011%3A0xda3280358f3ebfbf!2zMTM0OSBIdeG7s25oIFThuqVuIFBow6F0LCBQaMO6IE3hu7ksIFF14bqtbiA3LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1sen!2s!4v1603977922030!5m2!1sen!2s" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
                <h3 class="title-block">Dự án cùng tầm giá</h3>
                <div class="project-list">
                    <div class="row">
                        @foreach($dataSamePrice as $item)
                            <div class="col-lg-12 col-md-12 col-sm-12 col-custom">
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
        </section>
    @endif
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
        $(".list-place-slide .item a").click(function() {
            let element_id = $(this).data('element_id');
            $([document.documentElement, document.body]).animate({
                scrollTop: $(`#${element_id}`).offset().top
            }, 2000);
        });
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
