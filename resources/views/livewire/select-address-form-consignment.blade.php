<div class="form-group">
    <label for="">Địa chỉ BĐS <span class="red">*</span></label>
    <div class="row">
        <div class="col-md-6 mb-10">
            <select name="province_id"  class="form-control" wire:model="province_id" wire:change="getDistricts">
                <option value="">Tỉnh/ Thành phố</option>
                @if(!empty($provinces))
                    @foreach($provinces as $province)
                        <option value="{{ $province['province_id'] }}">{{ $province['type'] . ' ' . $province['name'] }}</option>
                    @endforeach
                @endif
            </select>
            @error('province_id')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mb-10">
            <select name="district_id"  class="form-control" wire:model="district_id" wire:change="getWards">
                <option value="">Quận/ Huyện</option>
                @if(!empty($districts))
                    @foreach($districts as $district)
                        <option value="{{ $district['district_id'] }}">{{ $district['type'] . ' ' . $district['name'] }}</option>
                    @endforeach
                @endif
            </select>
            @error('district_id')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <select name="ward_id"  class="form-control" wire:model="ward_id">
                <option value="">Phường/ Xã</option>
                @if(!empty($wards))
                    @foreach($wards as $ward)
                        <option value="{{ $ward['ward_id'] }}">{{ $ward['type'] . ' ' . $ward['name'] }}</option>
                    @endforeach
                @endif
            </select>
            @error('ward_id')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <input
                type="text"
                name="address"
                class="form-control"
                placeholder="Nhập địa chỉ, số nhà, ngõ hẻm..."
                value="{{ old('address') ?? '' }}"
            >
            @error('address')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
