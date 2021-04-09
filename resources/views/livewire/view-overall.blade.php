<section class="view-overall">
    <div class="container">
        <div class="top-title">
            <strong class="title-block">Xem quy hoạch bất động sản</strong>
            <p>Xem bản đồ quy hoạch bất dộng sản với hệ thống dữ liệu bản dồ linh hoạt, chính xác và đầy đủ nhất
                Việt Nam</p>
        </div>

        <form action="" method="get">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Tỉnh/ Thành phố</label>
                        <select name="province_id" wire:model="province_id" class="form-control" wire:change="getDistricts({{ $province_id }})">
                            <option value="">Chọn Tỉnh/ Thành phố</option>
                            @if(!empty($provinces))
                                @foreach($provinces as $province)
                                    <option value="{{ $province['province_id'] }}">{{ $province['type'] . ' ' . $province['name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Quận/ Huyện</label>
                        <select name="district_id" wire:model="district_id" class="form-control" wire:change="getWards({{ $district_id }})">
                            <option value="">Chọn Quận/ Huyện</option>
                            @if(!empty($districts))
                                @foreach($districts as $district)
                                    <option value="{{ $district['district_id'] }}">{{ $district['type'] . ' ' . $district['name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Phường/ Xã</label>
                        <select name="ward_id" wire:model="ward_id" class="form-control">
                            <option value="">Chọn Phường/ Xã</option>
                            @if(!empty($wards))
                                @foreach($wards as $ward)
                                    <option value="{{ $ward['ward_id'] }}">{{ $ward['type'] . ' ' . $ward['name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Dự án</label>
                        <select name="project_id" wire:model="project_id" class="form-control">
                            <option value="">Chọn dự án</option>
                            @if(!empty($projects))
                                @foreach($projects as $project)
                                    <option value="{{ $project['id'] }}">{{ $project['name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="btn-wp">
                <button typeof="submit" class="btn btn-secondary">Tìm kiếm</button>
            </div>
        </form>
    </div>
</section>
