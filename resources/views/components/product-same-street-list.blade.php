<section class="sameprice-products">
    <div class="container">
        <h3 class="title-block">Nhà riêng cho thuê cùng {{ $data[0]['street'] ?? '' }}</h3>
        <div class="project-list">
            <div class="row">
                @foreach($data as $item)
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
