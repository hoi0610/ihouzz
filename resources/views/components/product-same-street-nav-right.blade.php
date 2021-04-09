<div class="box box-district">
    <h3 class="title">Nhà riêng bán gần {{ $data[0]['district_name'] }}</h3>
    <ul class="list-district">
        @foreach($data as $value)
            <li><a href="#">{{ $value['ward_name'] }} (68584)</a></li>
        @endforeach
    </ul>
</div>