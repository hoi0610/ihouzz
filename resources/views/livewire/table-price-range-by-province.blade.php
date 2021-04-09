<div class="table-price-poverty">
    <div class="header-table">
        <strong class="title-table">Bảng giá nhà đất {{ $provinceName }} - Tháng {{ $currentDate }}</strong>
        <div class="form-table">
            <select wire:model="province_id" class="form-control" wire:change="getListPriceRangeByProvince">
                <option value="">Chọn Tỉnh/ Thành phố</option>
                @if(!empty($provinces))
                    @foreach($provinces as $province)
                        <option value="{{ $province['province_id'] }}">{{ $province['name'] ?? '' }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Quận</th>
            <th class="text-right">Giá trung bình</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($listPriceRange))
                @foreach($listPriceRange as $item)
                    <tr>
                        <td><a href="{{ route('valuation.district', $item['id']) }}">{{ $item['type'] ?? '' }} {{ $item['name'] ?? '' }}</a></td>
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
