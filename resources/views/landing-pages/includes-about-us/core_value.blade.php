<section class="core-value">
    <div class="container">
        <h3 class="title-block text-center">{{ $positions['core_value']['title'] ?? '' }}</h3>
        <div class="content row">
            @if(!empty($positions['core_value']['items']))
                @foreach($positions['core_value']['items'] as $item)
                    <div class="col-md-4 min-h">
                        <div class="item w-100 h-100">
                            <img src="{{ $item['image_url'] ?? '' }}{{ $item['image_location'] }}" alt="gia-tri-cot-loi" class="item w-100 h-100">
                            <div class="text"><span class="w-50">{{ $item['title'] }}</span></div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>
