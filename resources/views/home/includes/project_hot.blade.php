<!--section hightlight projects-->
<section class="hightlight-projects hightlight-bg">
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
                        <div class="wp-img">
                            <div>
                                <img src="{{$item['image_url'].$item['image_location']}}" alt="">
                            </div>
                        </div>
                        <span class="info"><strong>{{$item['title']}}</strong></span>
                    </a>
                </li>
            @endforeach
        </ul>
        @endif
    </div>
</section>
