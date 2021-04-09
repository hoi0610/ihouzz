<section class="services-system">
    <div class="container">
        <h3 class="title-block text-center">{{ $positions['title_items']['title'] }}</h3>
        <ul class="list-system">
            @if(!empty($positions['title_items']['items']))
                @foreach($positions['title_items']['items'] as $item)
                    <li class="item">
                        <div class="show-content">
                            <div class="box-blue">
                                <img src="{{ isset($item['image_url']) || isset($item['image_location']) ? $item['image_url'] . $item['image_location'] : '' }}" alt="he-thong-dich-vu">
                            </div>
                            <strong>{{ $item['title'] ?? '' }}</strong>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</section>
