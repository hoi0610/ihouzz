<div>
    <div class="installment">
        <h3 class="title-block">Tính vay trả góp</h3>
        <div class="loan-support">
            <span>Hỗ trợ cho vay:</span>
            <span class="price">~77,44 Triệu <span class="unit">/ Tháng</span></span>
        </div>

        <form action="" class="installment-sp">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Ngân hàng</label>
                        <select name="" id="" class="form-control">
                            <option value="">Chọn ngân hàng</option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá trị sản phẩm</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Giá trị sản phẩm" value="7.500.000.000">
                            <span class="input-group-btn">
                                                    <button class="btn btn-mint" type="button">Vnđ</button>
                                                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Thời hạn vay</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Thời hạn vay" value="10">
                            <span class="input-group-btn">
                                                    <button class="btn btn-mint" type="button">Năm</button>
                                                </span>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Lãi suất (Năm)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Lãi suất" value="7.7">
                            <span class="input-group-btn">
                                                    <button class="btn btn-mint" type="button">%</button>
                                                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Giá trị khoản vay (Tương ứng)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Giá trị khoản vay" value="5.200.000.000">
                            <span class="input-group-btn">
                                                    <button class="btn btn-mint" type="button">Vnđ</button>
                                                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">&nbsp;</label>
                        <button class="btn btn-primary"><img src="/html/assets/images/icons/accounting.png" alt="">@lang('Đăng ký vay')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
