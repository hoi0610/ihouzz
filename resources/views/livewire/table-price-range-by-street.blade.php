<div class="table-price-poverty">
    <div class="header-table">
        <strong class="title-table">Giá nhà đất theo đường</strong>
        <div class="form-table">
            <input
                type="text"
                class="form-control"
                placeholder="Nhập tên đường"
                wire:model.debounce.500ms="street"
                style="padding-left: 35px"
            >
            <span class="icon"><i class="fas fa-search"></i></span>
            <div
                wire:loading
                class="spinner-border text-primary"
                role="status"
                style="position: absolute; top: 10px; left: 10px; width: 20px; height: 20px"
            >
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Đường</th>
            <th>Phường</th>
            <th class="text-right">Giá trung bình</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($priceRange))
            @foreach($priceRange as $item)
                <tr>
                    <td><a href="{{ route('valuation.street',['dis_id' =>$districtId , 'str_id' => $item['street_id']]) }}">{{ $item['name'] ?? '' }}</a></td>
                    <td>{{ $item['ward_name'] ?? '' }}</td>
                    <td class="text-right">
                        <div class="col-price">
                            <div class="price-col">{{ format_price($item['price_average']) }}/m<sup>2</sup></div>
                            <div class="status-col">{{ $item['fluctuation'] ?? '' }}% @if(!is_null($item['fluctuation']) && $item['fluctuation'] > 0) <i class="fas fa-caret-up"></i> @else <i class="fas fa-caret-down"></i> @endif</div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>
