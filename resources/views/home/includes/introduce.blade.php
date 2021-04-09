@if(!empty($position['items']))
<section class="mark-point">
    <div class="container">
        <div class="list-point row">
            @foreach($position['items'] as $item)
            <div class="col-md-4">
                <div class="item">
                    <img src="{{$item['image_url'].$item['image_location']}}" alt="">
                    <div class="right-content">
                        <strong class="title">{{$item['title']}}</strong>
                        <div>{!! $item['description'] !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
