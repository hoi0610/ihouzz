<div>
    <div class="block block-utilities" id="block-utilities">
        <h3 class="title-block">Tiện ích khu vực</h3>
        <div class="content">
            <div class="map">
                {!! $map !!}
            </div>
            <div class="near-areas">
                <strong>Tiện ích xung quanh</strong>
                <ul class="list-utilities">
                    @if(isset($data['data']))
                        @foreach($datas['data'] as $data)
                            <li>
                                <a href="#">
                                    <strong class="name">{{ $data['name'] }}</strong>
                                    <p class="address">{{ $data['vicinity'] }}</p>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
