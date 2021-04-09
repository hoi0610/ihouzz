<section class="tech-ihouzz">
    <div class="container">
        <h3 class="title-block text-center">{{ $positions['apps']['title'] ?? '' }}</h3>
        <div class="content">
            <div class="row">
                @if(!empty($positions['apps']['items']))
                    @foreach($positions['apps']['items'] as $item)
                        <div class="col-md-6">
                            <div class="item-tech">
                                <div class="img"><img src="{{ $item['image_url'] ?? '' }}{{ $item['image_location'] ?? '' }}" alt="app-ihouzz"></div>
                                <div class="content-right">
                                    {!! $item['description'] ?? '' !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<!--section hightlight projects-->
<section class="hightlight-projects hightlight-bg" style="display: none;">
    <div class="container">
        <div class="content-intro">
            <strong class="title-block">{{$position['name']}}</strong>
            <div class="text">{!! $position['content'] !!}</div>
            <a href="{{$position['link_more']}}" class="view-all">Xem tất cả ></a>
        </div>
        @if(!empty($position['items']))
        <ul class="list-hightlight-pj">
            @foreach($position['items'] as $item)
                <li class="item">
                    <a href="{{$item['link']}}">
                        <div class="wp-img"><img src="{{$item['image_url'].$item['image_location']}}" alt=""></div>
                        <span class="info"><strong>{{$item['title']}}</strong></span>
                    </a>
                </li>
            @endforeach
        </ul>
        @endif
    </div>
</section>
