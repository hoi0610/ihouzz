<div class="box box-district">
    <h3 class="title">Loại bất động sản</h3>
    <ul class="list-district">
        @foreach($cates['data'] as $cate)
{{--            <li><a href="{{ route('category.nha-ban', ['product_category_id' => $cate['category_id']]) }}">{{ $cate['name'] }} ({{ $cate['product_count'] }})</a></li>--}}
        @endforeach
    </ul>
</div>
<div class="box box-district">
    <h3 class="title">Khu vực</h3>
    <ul class="list-district">
        @foreach($provinces['data'] as $cate)
{{--            <li><a href="{{ route('category.nha-ban', ['province_id' => $cate['province_id']]) }}">{{ $cate['province_name'] }} ({{ $cate['product_count'] }})</a></li>--}}
        @endforeach
    </ul>
</div>
