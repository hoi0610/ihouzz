@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    <livewire:form-search-agent :param="$params"/>
    <section class="map-point">
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.2358993643143!2d106.7350355148003!3d10.716279692362358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525567b3f2011%3A0xda3280358f3ebfbf!2zMTM0OSBIdeG7s25oIFThuqVuIFBow6F0LCBQaMO6IE3hu7ksIFF14bqtbiA3LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1sen!2s!4v1603977922030!5m2!1sen!2s" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </section>

    <section class="list-project-poverty">
        <div class="container">
            <h3 class="title-block">Đại lý ihouzz</h3>
            <div class="toolbar-wp">
                <div class="place-slide">
                    <ul class="list-place-slide">
                        @foreach($params['filters'] as $key => $value)
                            <li class="item">
                                @php $active = '';
                                    if(isset($params['filter']) && $key == $params['filter']){
                                        $active = 'active';
                                    }
                                @endphp
                                <a class="{{ $active }} filter" href="javascript:void(0)" data-name="filter" data-value="{{$key}}">{{$value}}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

            @if(!empty($data['data']))
            <div class="main-content">
                <div class="list-project-agency">
                    @foreach($data['data'] as $item)
                    <div class="item">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="info-agency">
                                    <div class="info-contact">
                                        <div class="wp-img"><img src="{{$item['image_url'].$item['image_location']}}" alt=""></div>
                                        <div class="right-content">
                                            <strong class="name">{{$item['name']}}</strong>
                                            <a class="phone-call" href="tel: {{$item['phone']}}">
                                                <img class="color" src="/html/assets/images/icons/phone-call-color.png" alt=""> {{ $item['phone'] }}
                                            </a>
                                            <p><i class="blue fas fa-map-marker-alt"></i> {{$item['address']}}</p>
                                        </div>
                                    </div>
                                    <div class="text">
                                        {!! $item['description'] !!}
                                    </div>
                                    <a href="{!! route('agents.show',['id' => $item['id']]) !!}" class="btn-view-detail">Xem chi tiết</a>
                                </div>
                            </div>
                            <div class="col-md-4 right-map">
                                <div class="show-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.2358993643143!2d106.7350355148003!3d10.716279692362358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525567b3f2011%3A0xda3280358f3ebfbf!2zMTM0OSBIdeG7s25oIFThuqVuIFBow6F0LCBQaMO6IE3hu7ksIFF14bqtbiA3LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1sen!2s!4v1603977922030!5m2!1sen!2s" width="100%" height="170" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    <span class="show-text-map">Xem bản đồ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <x-paginator-custom :data="$data"/>
            </div>
            @endif
        </div>
    </section>
@endsection

@section('after_scripts')

    <script>
        $('.filter').on('click',function(){
            let url = window.location.href;
            url = normalizeAmpersand(url);

            url = URI(url);
            if (url.hasQuery('filter')) {
                url.removeQuery('filter');
            }
            let href = url.toString();
            if ($(this).data('value') !== 'all') {
                href = updateUrlParameter($(this).data('name'),$(this).data('value'), href);
            }
            window.location.href = href;
        })
    </script>

{{--    <script type='text/javascript' src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB'></script>--}}
{{--    <script defer>--}}
{{--        function initialize() {--}}
{{--            var mapOptions = {--}}
{{--                zoom: 12,--}}
{{--                minZoom: 6,--}}
{{--                maxZoom: 17,--}}
{{--                zoomControl:true,--}}
{{--                zoomControlOptions: {--}}
{{--                    style:google.maps.ZoomControlStyle.DEFAULT--}}
{{--                },--}}
{{--                center: new google.maps.LatLng({{ $latitude }}, {{ $longitude }}),--}}
{{--                mapTypeId: google.maps.MapTypeId.ROADMAP,--}}
{{--                scrollwheel: false,--}}
{{--                panControl:false,--}}
{{--                mapTypeControl:false,--}}
{{--                scaleControl:false,--}}
{{--                overviewMapControl:false,--}}
{{--                rotateControl:false--}}
{{--            }--}}
{{--            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);--}}
{{--            var image = new google.maps.MarkerImage("assets/images/pin.png", null, null, null, new google.maps.Size(40,52));--}}
{{--            var places = @json($mapShops);--}}

{{--            for(place in places)--}}
{{--            {--}}
{{--                place = places[place];--}}
{{--                if(place.latitude && place.longitude)--}}
{{--                {--}}
{{--                    var marker = new google.maps.Marker({--}}
{{--                        position: new google.maps.LatLng(place.latitude, place.longitude),--}}
{{--                        icon:image,--}}
{{--                        map: map,--}}
{{--                        title: place.name--}}
{{--                    });--}}
{{--                    var infowindow = new google.maps.InfoWindow();--}}
{{--                    google.maps.event.addListener(marker, 'click', (function (marker, place) {--}}
{{--                        return function () {--}}
{{--                            infowindow.setContent(generateContent(place))--}}
{{--                            infowindow.open(map, marker);--}}
{{--                        }--}}
{{--                    })(marker, place));--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}
{{--        google.maps.event.addDomListener(window, 'load', initialize);--}}

{{--        function generateContent(place)--}}
{{--        {--}}
{{--            var content = `--}}
{{--            <div class="gd-bubble" style="">--}}
{{--                <div class="gd-bubble-inside">--}}
{{--                    <div class="geodir-bubble_desc">--}}
{{--                    <div class="geodir-bubble_image">--}}
{{--                        <div class="geodir-post-slider">--}}
{{--                            <div class="geodir-image-container geodir-image-sizes-medium_large ">--}}
{{--                                <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">--}}
{{--                                    <ul class="geodir-post-image geodir-images clearfix">--}}
{{--                                        <li>--}}
{{--                                            <div class="geodir-post-title">--}}
{{--                                                <h4 class="geodir-entry-title">--}}
{{--                                                    <a href="">`+place.name+`</a>--}}
{{--                                                </h4>--}}
{{--                                            </div>--}}
{{--                                            <a href=""><img src="`+place.thumbnail+`" alt="`+place.name+`" class="align size-medium_large" width="1400" height="930"></a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="geodir-bubble-meta-side">--}}
{{--                    <div class="geodir-output-location">--}}
{{--                    <div class="geodir-output-location geodir-output-location-mapbubble">--}}
{{--                        <div class="geodir_post_meta  geodir-field-post_title"><span class="geodir_post_meta_icon geodir-i-text">--}}
{{--                            <i class="fas fa-minus" aria-hidden="true"></i>--}}
{{--                            <span class="geodir_post_meta_title">Place Title: </span></span>`+place.name+`</div>--}}
{{--                        <div class="geodir_post_meta  geodir-field-address" itemscope="" itemtype="http://schema.org/PostalAddress">--}}
{{--                            <span class="geodir_post_meta_icon geodir-i-address"><i class="fas fa-map-marker-alt" aria-hidden="true"></i>--}}
{{--                            <span class="geodir_post_meta_title">Address: </span></span><span itemprop="streetAddress">`+place.address+`</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            </div>--}}
{{--            </div>`;--}}

{{--            return content;--}}

{{--        }--}}
{{--    </script>--}}
@stop
