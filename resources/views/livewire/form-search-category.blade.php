<div class="select-info-search">
    <form action="{{ route('category.nha-ban') }}" method="get">
        <div class="container" x-data="{ open : false}">
            <div class="form-group">
                <label for="">Khu vực</label>
                <select name="province_id" wire:model="province_id" class="form-control" wire:change="getDistricts">
                    <option value="">Tỉnh/ Thành</option>
                    @if(!empty($provinces))
                        @foreach($provinces as $province)
                            <option value="{{ $province['province_id'] }}">{{ $province['type'] . ' ' . $province['name'] ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="">Loại hình BĐS</label>
                <select name="product_category_id" wire:model="category_id"  class="form-control">
                    <option value="">Chọn loại hình BĐS</option>
                    @if(!empty($categories))
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="">Khoảng giá</label>
                <select name="price" wire:model="price" class="form-control" wire:change="getPriceRange">
                    <option value="">Mức giá</option>
                    @if(!empty($priceVariants))
                        @foreach($priceVariants as $value)
                            <option value="{{ $value['id'] ?? '' }}">{{ $value['name'] ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="">Số phòng ngủ</label>
                <select name="bedroom"  class="form-control">
                    <option value="">Phòng ngủ</option>
                    @if(!empty($bedroomVariants))
                        @foreach($bedroomVariants as $value)
                            <option value="{{ collect(explode(' ', $value['name']))->first()  }}">{{ $value['name'] ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="">Sắp xếp theo</label>
                <select name="sort_by" class="form-control">
                    <option value="">Giá từ thấp đến cao</option>
                    <option value="">Giá từ cao đến thấp</option>
                </select>
            </div>
            <span class="label-text-advance show-advance-action" @click="{ open = true }">
                <img src="/html/assets/images/icons/icon-search.png" alt="">
            </span>
            <button type="submit" class="btn btn-search btn-secondary"><i class="fas fa-search"></i> Tìm kiếm</button>

            <div class="show-content-advance mt-3" x-show="open" @click.away="open = false">
                <div class="row list-item">
                    <div class="col-lg-3 col-md-4 col-city">
                        <select name="province_id" wire:model="province_id" class="form-control" wire:change="getDistricts">
                            <option value="">Tỉnh/ Thành</option>
                            @if(!empty($provinces))
                                @foreach($provinces as $province)
                                    <option value="{{ $province['province_id'] }}">{{ $province['type'] . ' ' . $province['name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <select name="district_id" wire:model="district_id" class="form-control" wire:change="getWards">
                            <option value="">Quận/ Huyện</option>
                            @if(!empty($districts))
                                @foreach($districts as $district)
                                    <option value="{{ $district['district_id'] }}">{{ $district['type'] . ' ' . $district['name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <select name="ward_id" wire:model="ward_id" class="form-control">
                            <option value="">Phường/ Xã</option>
                            @if(!empty($wards))
                                @foreach($wards as $ward)
                                    <option value="{{ $ward['ward_id'] }}">{{ $ward['type'] . ' ' . $ward['name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4 col-ward">
                        <select name="price" wire:model="price" class="form-control" wire:change="getPriceRange">
                            <option value="">Mức giá</option>
                            @if(!empty($priceVariants))
                                @foreach($priceVariants as $value)
                                    <option value="{{ $value['id'] ?? '' }}">{{ $value['name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row list-item">
                    <div class="col-lg-3 col-md-4 col-size">
                        <select name="acreage" wire:model="area" class="form-control" wire:change="getAreaRange">
                            <option value="">Diện tích</option>
                            @if(!empty($areaVariants))
                                @foreach($areaVariants as $value)
                                    <option value="{{ $value['id'] ?? '' }}">{{ $value['name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4 select-direction-container">
                        <select name="product_direction_id" wire:model="direction_id" class="form-control">
                            <option value="">Hướng</option>
                            @if(!empty($directions))
                                @foreach($directions as $direction)
                                    <option value="{{ $direction['id'] }}">{{ $direction['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row list-item">
                    <div class="col-lg-12 col-md-8 col-rented-ccch">
                        <div class="title-1 cl6">Tình trạng</div>
                        <div style="display: grid; grid-row-gap: 20px; grid-column-gap: 20px; grid-template-columns: 1fr 1fr 1fr">
                            @foreach($statuss as $status)
                                <label class="checkbox" style="display: flex; align-items: center;justify-content: flex-start; width: 100%;">
                                    <input type="checkbox" wire:model="status_id" name="product_status_id[]" value="{{ $status['id'] }}">
                                    <span style="top: 7px"></span>
                                    {{ $status['name'] }}
                                </label>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="row list-item">
                    <div class="col-lg-6 col-md-12 col-3d-touring">
                        <div class="title-1 cl6">Loại nội dung</div>
                        <label class="checkbox"> <input type="checkbox" id="virtual-touring" name="virtual_touring" value="1"> <span></span> 3D Tour </label>
                    </div>
                </div>
                <div class="row list-item">
                    <div class="col-lg-6 col-md-12">
                        <div class="save-filter input-group">
                            <input id="name-search" type="text" class="form-control" placeholder="Lưu bộ search" wire:model="nameFormSearch">
                            <span class="input-group-addon none">
                                <span class="btn btn-primary" id="save-apply-search" wire:click="saveFormSearch">Lưu</span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        @if(!empty($cookies))
                            <div class="wapper-saved-cookie">
                                @foreach($cookies as $key => $item)
                                    <div>
                                        <div class="cookie-name" wire:click="applyCookieValueFormSearch('{{ $key }}')">{{ $key }}</div>
                                        <div class="clear" wire:click="removeCookie('{{ $key }}')">&times;</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <button class="reset" type="reset" wire:click="resetFormSearch"><i class="fas fa-undo-alt"></i> Xóa</button>
            </div>
        </div>
        <input type="hidden" name="price_min" value="{{ $price_min }}">
        <input type="hidden" name="price_max" value="{{ $price_max }}">
        <input type="hidden" name="acreage_min" value="{{ $acreage_min }}">
        <input type="hidden" name="acreage_max" value="{{ $acreage_max }}">
    </form>
</div>

<style>
    .wapper-saved-cookie {
        display: grid;
        grid-column-gap: 20px;
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }
    .wapper-saved-cookie div {
        width: 200px;
        position: relative;
        cursor: pointer;
    }
    .wapper-saved-cookie div .cookie-name {
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 5px 15px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        border-radius: 4px;
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        -o-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }
    .wapper-saved-cookie div .cookie-name::after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 0;
        background: #0061ff61;
        z-index: 1;
        transition: all .3s;
        border-radius: 4px;
    }
    .wapper-saved-cookie div .cookie-name:hover::after {
        width: 100%;
    }

    .wapper-saved-cookie div div.clear {
        position: absolute;
        top: -9px;
        right: -7px;
        width: 15px;
        height: 15px;
        background-color: #e9ecef;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        padding: 10px;
        transition: 250ms all ease-in-out;
    }
    .wapper-saved-cookie div > div.clear:hover {
        background-color: #ff9aa4;
    }
</style>

