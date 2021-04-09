<section class="block-projects">
    <div class="container">
        <h3 class="title-block">{{$position['name']}}</h3>
        <div class="place-slide">
            <ul class="list-place-slide slide-place-action">
                <li class="item"><a class="active select_district" href="javascript:void(0)">Tất cả</a></li>
                @foreach($position['items']['district'] as $district_id => $district_name)
                    <li class="item">
                        <a href="javascript:void(0)" data-id="{{$district_id}}" class="select_district">{!! $district_name !!}</a>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('category.grid', str_slug($position['title'])) }}" class="view-all">Xem tất cả</a>
        </div>

        <div class="project-list project_list_{{$position['id']}}" data-id="{{$position['id']}}">
            <div class="row" >
                @foreach($position['items']['products'] as $products)
                    @foreach($products as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-custom item_product district_{{$item['district_id']}}">
                        <div class="project-item-wrapper">
                            <a href="#" class="total-content">
                                <div class="media-block">
                                    <div class="wrap-img">
                                        <img src="{{$item['image_url'].$item['image']}}" alt="">
                                    </div>
                                    <div class="lb-wrap">
                                        @if($item['is_hot'])
                                            <span class="lb-pj lb-noibat">Nổi bật</span>
                                        @endif
                                        @if($item['is_good_price'])
                                            <span class="lb-pj lb-giamgia">Giá tốt</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="content-info-block">
                                    <p class="name">{{$item['name']}}</p>
                                    <div class="location">
                                        <span>{{$item['address']}}</span>
                                    </div>
                                    <div class="price">
                                        <span class="current-price">
                                            {!! format_price($item['list_price']) !!}
                                        </span>
                                    </div>
                                    <div class="show-info">
                                        <span class="square icon">
                                            <img src="/html/assets/images/icons/dt.png" alt="">
                                            {{$item['acreage']}}m2
                                        </span>
                                        <span class="icon bed">
                                            <img src="/html/assets/images/icons/bed.png" alt="">
                                            {{$item['bedroom']}}
                                        </span>
                                        <span class="icon bath">
                                            <img src="/html/assets/images/icons/bath.png" alt="">
                                            {{$item['bathroom']}}
                                        </span>
                                        @if($item['is_furniture'])
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
                @endforeach
            </div>
            <div class="row_hidden hidden">
                @foreach($position['items']['products'] as $products)
                    @foreach($products as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-custom item_product district_{{$item['district_id']}}">
                            <div class="project-item-wrapper">
                                <a href="#" class="total-content">
                                    <div class="media-block">
                                        <div class="wrap-img">
                                            <img src="{{$item['image_url'].$item['image']}}" alt="">
                                        </div>
                                        <div class="lb-wrap">
                                            @if($item['is_hot'])
                                                <span class="lb-pj lb-noibat">Nổi bật</span>
                                            @endif
                                            @if($item['is_good_price'])
                                                <span class="lb-pj lb-giamgia">Giá tốt</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="content-info-block">
                                        <p class="name">{{$item['name']}}</p>
                                        <div class="location">
                                            <span>{{$item['address']}}</span>
                                        </div>
                                        <div class="price">
                                            <span class="current-price">{!! number_format($item['list_price']) !!}</span>
                                        </div>
                                        <div class="show-info">
                                        <span class="square icon">
                                            <img src="/html/assets/images/icons/dt.png" alt="">
                                            {{$item['acreage']}}m2
                                        </span>
                                            <span class="icon bed">
                                            <img src="/html/assets/images/icons/bed.png" alt="">
                                            {{$item['bedroom']}}
                                        </span>
                                            <span class="icon bath">
                                            <img src="/html/assets/images/icons/bath.png" alt="">
                                            {{$item['bathroom']}}
                                        </span>
                                            @if($item['is_furniture'])
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
                @endforeach
            </div>
        </div>
    </div>
</section>
