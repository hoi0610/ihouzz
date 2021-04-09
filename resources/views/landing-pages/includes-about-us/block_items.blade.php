<!-- end section -->
<section class="process-develop hightlight-bg">
    <div class="container">
        <h3 class="title-block text-center">{{ $positions['block_items']['title'] ?? '' }}</h3>

        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $positions['block_items']['image_url'] ?? '' }}{{$positions['block_items']['image_location'] ?? ''}}" alt="qua-trinh-phat-tien">
                </div>
                <div class="col-md-6">
                    <ul class="events">
                        @if(!empty($positions['block_items']['items']))
                            @foreach($positions['block_items']['items'] as $item)
                                <li><span><b class="blue">{{ $item['title'] ?? '' }}:</b> {!! $item['description'] ?? '' !!}</span></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
