<section class="view-quick">
    <div class="container">
        <div class="top-title">
            <strong class="title-block">Xem nhanh giá bất động sản</strong>
            <p>Xem giá bất động sản với hệ thống dữ liệu bản đồ linh hoạt, chính xác và đầy đủ nhất Việt Nam bằng
                ứng dụng công nghệ 4.0</p>
        </div>

        <div class="row top-title">
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
            <div class="col-md-3 search-item">
                <div class="btn-wp">
                    <button class="btn btn-secondary">Tìm kiếm</button>
                </div>
            </div>
        </div>


        <div class="row row-figure">
            <div class="col-md-3">
                <div class="item">
                    <strong class="num">1,976,507</strong>
                    <p>Tài sản Trên khắp cả nước</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <strong class="num">60,678</strong>
                    <p>Khu vực được phân tích trong quý 1/2020</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <strong class="num">60,678</strong>
                    <p>Lượt định giá</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item item-notificate">
                    <img src="/html/assets/images/icons/notification.png" alt="">
                    <div class="text">
                        <strong>Đăng ký</strong>
                        <p>Nhận báo cáo thị trường BĐS hàng tháng</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
