<div class="breadcrumb-wp">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            @if (isset($breadcrumb))
                @foreach($breadcrumb as $index => $item)
                    <li class="breadcrumb-item {{($index+1)==count($breadcrumb) ? 'active' : ''}}"><a href="{{url($item['link'])}}" title="">{!! $item['name'] !!}</a></li>
                @endforeach
            @endif
            </ol>
        </nav>
    </div>
</div>
