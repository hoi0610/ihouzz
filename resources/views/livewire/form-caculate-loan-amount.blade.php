@if(!is_null($layout) && $layout == 'layout1')
    <div class="wp-block-calculate">
        <form action="{{ route('goi-vay.chitiet',  $bank_id ) }}" method="get">
            @csrf
            <strong class="title">Tính vay mua nhà</strong>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Số tiền cần vay</label>
                        <input type="text" name="loan_amount" class="form-control" placeholder="Nhập số tiền cần vay">
                    </div>
                    <div class="form-group">
                        <label for="">Nhu cầu vay</label>
                        <select name="loan_demand"  class="form-control">
                            <option value="mua-nha">Mua nhà</option>
                            <option value="mua-oto">Mua ô tô</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ngân hàng</label>
                        <select name="bank"  class="form-control" wire:model="bank_id">
                            <option value="">Chọn ngân hàng</option>
                            @if(!empty($allLoanPackage))
                                @foreach($allLoanPackage as $bank)
                                    <option value="{{ $bank['id'] ?? '' }}">{{ $bank['short_name'] ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Thời gian ưu đãi</label>
                        <div class="input-group">
                            <input type="text" name="loan_preferential_time" class="form-control" placeholder="Nhập thời gian ưu đãi">
                            <span class="input-group-btn">
                                <button class="btn btn-mint" type="button">Tháng</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Hạn mức vay</label>
                        <div class="input-group">
                            <input type="text" name="loan_limit" class="form-control" placeholder="Nhập hạn mức vay">
                            <span class="input-group-btn">
                                <button class="btn btn-mint" type="button">%</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Thời gian vay</label>
                        <div class="input-group">
                            <input type="text" name="loan_time" class="form-control" placeholder="Nhập thời gian vay">
                            <span class="input-group-btn">
                                <button class="btn btn-mint" type="button">Tháng</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-wp">
                <button type="submit" class="btn btn-primary">Tính vay</button>
            </div>
        </form>
    </div>
@elseif(!is_null($layout) && $layout == 'layout2')
    <div class="wp-block-calculate box-shadow">
        <form action="{{ route('goi-vay.chitiet',  $bank_id ) }}" method="get">
            @csrf
            <div class="form-group">
                <label for="">Số tiền cần vay</label>
                <input type="text" name="loan_amount" class="form-control" placeholder="Nhập số tiền cần vay">
            </div>
            <div class="form-group">
                <label for="">Nhu cầu vay</label>
                <select name="loan_demand" class="form-control">
                    <option value="mua-nha">Mua nhà</option>
                    <option value="mua-oto">Mua ô tô</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Thời gian vay</label>
                <div class="input-group">
                    <input type="text" name="loan_time" class="form-control" placeholder="Nhập thời gian vay">
                    <span class="input-group-btn">
                        <button class="btn btn-mint" type="button">Tháng</button>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="">Thời gian ưu đãi</label>
                <div class="input-group">
                    <input type="text" name="loan_preferential_time" class="form-control" placeholder="Nhập thời gian ưu đãi">
                    <span class="input-group-btn">
                        <button class="btn btn-mint" type="button">Tháng</button>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="">Hạn mức vay</label>
                <div class="input-group">
                    <input type="text" name="loan_limit" class="form-control" placeholder="Nhập hạn mức vay">
                    <span class="input-group-btn">
                        <button class="btn btn-mint" type="button">%</button>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="">Ngân hàng</label>
                <select name="bank"  class="form-control" wire:model="bank_id">
                    <option value="">Chọn ngân hàng</option>
                    @if(!empty($allLoanPackage))
                        @foreach($allLoanPackage as $bank)
                            <option value="{{ $bank['id'] ?? '' }}">{{ $bank['short_name'] ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Tìm kiếm</button>
        </form>
    </div>
@endif
