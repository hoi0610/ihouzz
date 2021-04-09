<div class="select-info-search">
    <form action="" method="get">
        <div class="container">
            <div class="form-group">
                <label for="">Tỉnh/ Thành phố</label>
                <select name="province_id" wire:model="param.province_id" class="form-control" wire:change="getDistricts">
                    <option value="">Chọn Tỉnh/ Thành phố</option>
                    @if(!empty($provinces))
                        @foreach($provinces as $province)
                            <option value="{{ $province['province_id'] }}">{{ $province['type'] . ' ' . $province['name'] ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="">Quận/ Huyện</label>
                <select name="district_id" wire:model="param.district_id" class="form-control">
                    <option value="">Chọn Quận/ Huyện</option>
                    @if(!empty($districts))
                        @foreach($districts as $district)
                            <option value="{{ $district['district_id'] }}">{{ $district['type'] . ' ' . $district['name'] ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <input type="hidden" name="filter" wire:model="param.filter" />
            <button type="submit" class="btn btn-search btn-secondary"><i class="fas fa-search"></i> Tìm kiếm</button>
        </div>
    </form>
</div>
