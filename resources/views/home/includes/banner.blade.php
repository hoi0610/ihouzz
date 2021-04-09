
@if(!empty($position['items']))
<!--section slide banner-->
<section class="slide-banner">
    <div class="container">
        <ul class="list-banner">
            @foreach($position['items'] as $item)
            <li class="item">
                <a href="{{$item['link']}}"><img src="{{$item['image_url'].$item['image_location']}}" alt=""></a>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endif
