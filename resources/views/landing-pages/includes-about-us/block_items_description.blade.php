<section class="vision-mission">
    <div class="container">
        <h3 class="title-block text-center">{{ $positions['block_items_description']['title'] }}</h3>
        <div class="content">
            @if($positions['block_items_description']['items'])
                @foreach($positions['block_items_description']['items'] as $item)
                    <div class="one__block">
                        <div class="wp-img">
                            <img src="{{ $item['block_items_description']['image_url'] ?? '' }}{{ $item['block_items_description']['image_location'] ?? '' }}" alt="tamnhin-sumenh">
                        </div>
                        <div class="content-text">
                            <strong class="title">{{ $item['title'] ?? '' }}</strong>
                            <p>{{ $item['description'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
