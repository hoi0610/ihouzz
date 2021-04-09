<div class="table-price-poverty">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>
                    <div class="action-page">
                        <span class="icon prev" wire:click="prevMonth"><i class="fas fa-angle-left"></i></span>
                        <span class="icon next" wire:click="nextMonth"><i class="fas fa-angle-right"></i></span>
                    </div>
                </th>
                @if(!empty($labels))
                    @foreach($labels as $label)
                        <th class="text-center">{{ $label }}</th>
                    @endforeach
                @endif
            </tr>
            </thead>
            <tbody>
                @if(!empty($priceRange))
                    @foreach($priceRange as $key => $value)
                        <tr>
                            <td><a href="#">{{ $value['name'] }}</a></td>
                            @foreach($labels as $label)
                                @if(isset($list[$key][$label]) && $list[$key][$label])
                                    <td class="text-center">
                                        <div class="col-price">
                                            <div class="price-col">{{ format_price($list[$key][$label]['price_average']) }}/m<sup>2</sup></div>
                                            <div class="status-col">{{ $list[$key][$label]['fluctuation'] ?? '' }}% @if(isset($list[$key][$label]['fluctuation']) && $list[$key][$label]['fluctuation'] > 0) <i class="fas fa-caret-up"></i> @else <i class="fas fa-caret-down"></i> @endif</div>
                                        </div>
                                    </td>
                                @else
                                    <td class="text-center">
                                        <div class="col-price">
                                            <div class="price-col"></div>
                                            <div class="status-col"></div>
                                        </div>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>
