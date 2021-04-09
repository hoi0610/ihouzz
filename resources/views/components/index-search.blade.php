<!-- begin banner -->
<section class="banner">
    <div class="bg-banner">
        <img src="/html/assets/images/banner-main.png" alt="">
    </div>
    <div class="container">
        <div class="content-banner">
            <div class="text">
                <h3>Nền tảng công nghệ</h3>
                <h2>Kết nối bất động sản doanh nghiệp</h2>
            </div>

            <ul class="list-button">
                @if(\App\Facade\ApiSetting::listProductTypes([])['status'] == 'success')
                    @foreach(\App\Facade\ApiSetting::listProductTypes([])['data'] as $key => $data)
                        <li><a href="javascript:void(0)" class="{{ $key == 0 ? 'active' : '' }}">{{ $data['name'] }}</a></li>
                    @endforeach
                @endif
            </ul>

            <div class="stage-search-area">
                <div class="dropdown">
                    <select name="" class="form-control">
                        @if(\App\Facade\ApiSetting::listProductCategories([])['status'] == 'success')
                            @foreach(\App\Facade\ApiSetting::listProductCategories([])['data'] as $key => $data)
                                <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="collect-info">
                    <div class="input-search">
                        <input type="text" class="form-control"
                               placeholder="Nhập địa chỉ, khu vực, thành phố ...vv">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="advance-search">
                            <span class="label-text show-advance-action">
                                <img src="/html/assets/images/icons/icon-search.png" alt="">
                                Nâng cao
                            </span>
                    </div>
                </div>
                <div class="show-content-advance">
                    <form action="">
                        <div class="row list-item">
                            <div class="col-lg-3 col-md-4 col-city">
                                <select name="" class="form-control">
                                    <option value="">Tp. Hồ Chí Minh</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 col-district">
                                <select name="" class="form-control">
                                    <option value="">Quận/ Huyện</option>
                                    <option value="">Quận 1</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 col-ward">
                                <select name="" class="form-control">
                                    <option value="">Phường/ Xã</option>
                                    <option value="">Quận 1</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 col-ward">
                                <select name="" class="form-control">
                                    <option value="">Mức giá</option>
                                    <option value="">500-1000</option>
                                </select>
                            </div>
                        </div>
                        <div class="row list-item">
                            <div class="col-lg-3 col-md-4 col-size">
                                <select name="" class="form-control">
                                    <option value="">Diện tích</option>
                                    <option value="">Dưới 30m2</option>
                                    <option value="">50-100m2</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 select-direction-container">
                                <select name="" class="form-control">
                                    <option value="">Hướng</option>
                                    @if(\App\Facade\ApiSetting::listProductDirections([])['status'] == 'success')
                                        @foreach(\App\Facade\ApiSetting::listProductDirections([])['data'] as $key => $data)
                                            <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                        @endforeach
                                    @endif
                                    <option value="">Đông</option>
                                    <option value="">Tây</option>
                                    <option value="">Nam</option>
                                </select>
                            </div>
                        </div>
                        <div class="row list-item">
                            <div class="col-lg-6 col-md-8 col-rented-ccch">
                                <div class="title-1 cl6">Tình trạng</div>
                                <label class="checkbox">
                                    <input type="checkbox" id="status_listing_5" name="status_listing[]" value="5">
                                    <span></span>Đặc biệt
                                </label>
                                <label class="checkbox ">
                                    <input type="checkbox" id="status_listing_6" name="status_listing[]" value="6">
                                    <span></span>Đã thẩm định
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" id="status_listing" class="status_listing"
                                           name="status_listing[]" value="1"> <span></span>Đã bán
                                </label>
                            </div>
                        </div>
                        <div class="row list-item">
                            <div class="col-lg-6 col-md-12 col-3d-touring">
                                <div class="title-1 cl6">Loại nội dung</div>
                                <label class="checkbox"> <input type="checkbox" id="virtual-touring"
                                                                name="virtual_touring" value="1"> <span></span> 3D
                                    Tour </label>
                            </div>
                        </div>
                        <div class="row list-item">
                            <div class="col-lg-6 col-md-12">
                                <div class="save-filter input-group">
                                    <input id="name-search" type="text" class="form-control"
                                           placeholder="Lưu bộ search" value=""> <span
                                        class="input-group-addon none"> <span class="btn btn-primary"
                                                                              id="save-apply-search">Lưu</span> </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <button class="reset" type="reset"><i class="fas fa-undo-alt"></i> Xóa</button>
                </div>
                <button class="btn btn-search btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </div>
</section>
