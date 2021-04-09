<div class="view-quick">
    <div class="top-title">
        <strong class="title-block">Xem nhanh giá bất động sản</strong>
        <p>Xem giá bất động sản với hệ thống dữ liệu bản đồ linh hoạt, chính xác và đầy đủ nhất Việt Nam bằng ứng dụng công nghệ 4.0</p>
    </div>
    <form action="{{ $linkAction }}" method="get">
        <div class="d-flex align-items-center">
            <div class="form-group w-25 mr-3">
                <label for="">Tỉnh/ Thành phố</label>
                <select name="province_id" wire:model="province_id" class="form-control" wire:change="getDistricts">
                    <option value="">Chọn Tỉnh/ Thành phố</option>
                    @if(!empty($provinces))
                        @foreach($provinces as $province)
                            <option value="{{ $province['province_id'] }}">{{ $province['type'] . ' ' . $province['name'] ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group w-25 mr-3">
                <label for="">Quận/ Huyện</label>
                <select name="district_id" wire:model="district_id" class="form-control" wire:change="getStreets">
                    <option value="">Chọn Quận/ Huyện</option>
                    @if(!empty($districts))
                        @foreach($districts as $district)
                            <option value="{{ $district['district_id'] }}">{{ $district['type'] . ' ' . $district['name'] ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group w-25 mr-3">
                <label for="">Đường/ Phố</label>
                <select name="street_id" wire:model="street_id" class="form-control">
                    <option value="">Chọn Đường/ Phố</option>
                    @if(!empty($streets))
                        @foreach($streets as $street)
                            <option value="{{ $street['id'] }}">{{ $street['street_name'] ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="btn-wp w-25">
                <button class="btn btn-secondary">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
