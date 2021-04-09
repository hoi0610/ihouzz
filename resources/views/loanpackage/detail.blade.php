@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => '#', 'name' => 'Gói vay'],
    ]])

    @include('includes.option')

    <section class="wrap-loan-package">
        <div class="container">
            <div class="main-content loan-package">
                <h3 class="title">Hiện có {{ $data['total_package'] ?? 0 }} gói vay mua nhà</h3>
                <section class="package-detail">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="item-loan item-detail {{ $data['logo_class_color'] ?? '' }}">
                                <div class="head">
                                    <img src="{{ $data['logo'] ?? '' }}" alt="">
                                    <a href="#">Xem thêm gói vay khác ></a>
                                </div>
                                <div class="body">
                                    <strong>{{ $data['title'] ?? '' }}</strong>
                                    <div>
                                        {{ $data['description'] ?? '' }}
                                    </div>
                                    <p class="hightlight"> <span>Lãi suất cho vay mua nhà ưu đãi cực hấp dẫn</span></p>

                                    <div class="info-detail-package">
                                        <div class="block">
                                            <strong>Thông tin gói vay</strong>
                                            <div class="info-body">
                                                <div class="item"><span class="label-width">Lãi suất ưu đãi ban đầu</span> <div class="value">{{ $data['interest_per_year'] ?? '' }}%/Năm</div></div>
                                                <div class="item"><span class="label-width">Thời gian áp dụng lãi suất ưu đãi</span> <div class="value">{{ $data['preferential_time'] ?? '' }} tháng</div></div>
                                                <div class="item"><span class="label-width">Lãi suất sau ưu đãi</span><div class="value"> {{ isset($data['interest_rate_after_incentive']) && $data['interest_rate_after_incentive'] > 0 ? 'Lãi suất thả nổi -' . $data['interest_rate_after_incentive'] . '%' : '0%'}}</div></div>
                                                <div class="item"><span class="label-width">Tỷ lệ vay</span> <div class="value">{{ $data['loan_rate'] ?? '' }}%</div></div>
                                                <div class="item"> <span class="label-width">Thời gian cho vay</span> <div class="value">{{ isset($data['loan_period']) ? $data['loan_period']/12 : '' }} năm</div></div>
                                                <div class="item"><span class="label-width">Phí trả nợ trước bạ</span> <div class="value">{{ $data['registration_fee_payment'] ?? '' }}</div></div>
                                                <div class="item"><span class="label-width">Điều kiện áp dụng</span> <div class="value">{{ $data['conditions_apply'] ?? '' }}</div></div>
                                                <input type="hidden" value="{{ $data['interest_per_year'] ?? '' }}" name="interest_rate">
                                                <input type="hidden" value="{{ $data['preferential_time'] ?? '' }}" name="timeBorrowed">
                                                <input type="hidden" value="{{ $data['interest_rate_after_incentive'] ?? '' }}" name="interestRateAfter">
                                            </div>
                                        </div>
                                        <div class="block">
                                            <strong>Yêu cầu hồ sơ</strong>
                                            {!! $data['conditions_apply'] ?? '' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 no-padding-left">
                            <div class="wrap-box">
                                @if(session('error'))
                                    <ul class="alert alert-danger">
                                        @foreach(session('error') as $message)
                                            <li>{{ $message[0] }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <form action="{{ route('goi-vay.applyLoanPackage') }}" method="post">
                                    @csrf
                                    <div class="box-shadow">
                                        <strong class="blue title">Đăng ký gói vay này ngay</strong>
                                        <div class="block">
                                            <div class="step-line">
                                                <span class="step">1</span>
                                                Thông tin gói vay
                                            </div>
                                            <div class="text">
                                                <p>Gói vay</p>
                                                <strong>Nhà dự án | One Palace | Standard Chartered| Lãi suất ưu đãi 5.99% | Ưu đãi 12 tháng</strong>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <div class="step-line">
                                                <span class="step">2</span>
                                                Thông tin khách hàng
                                            </div>
                                            <div class="body">
                                                <div class="form-group">
                                                    <label for="">Tên khách hàng <span class="red">*</span></label>
                                                    <input
                                                        type="text"
                                                        name="customer_name"
                                                        class="form-control"
                                                        placeholder="Nhập tên khách hàng"
                                                        value="{{ old('customer_name') ?? '' }}"
                                                    >
                                                    @error('customer_name')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Số điện thoại <span class="red">*</span></label>
                                                    <input
                                                        type="text"
                                                        name="customer_phone"
                                                        class="form-control"
                                                        placeholder="Nhập số điện thoại"
                                                        value="{{ old('customer_phone') ?? '' }}"
                                                    >
                                                    @error('customer_phone')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email <span class="red">*</span></label>
                                                    <input
                                                        type="text"
                                                        name="customer_email"
                                                        class="form-control"
                                                        placeholder="Nhập địa chỉ Email"
                                                        value="{{ old('customer_email') ?? '' }}"
                                                    >
                                                    @error('customer_email')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Ghi chú</label>
                                                    <input
                                                        type="text"
                                                        name="customer_note"
                                                        class="form-control"
                                                        placeholder="Mã căn/ Tên môi giới/ Khác..."
                                                        value="{{ old('customer_note') ?? '' }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Gửi thông tin</button>
                                    </div>
                                    <input type="hidden" name="loanpackage_id" value="{{ request('id') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="section">
                    @if(session('success'))
                        <input class="modal-btn" type="checkbox" id="modal-btn" name="modal-btn"/>
                        <label for="modal-btn"></label>
                        <div class="modal">
                            <div class="modal-wrap">
                                <h3 style="color: green; font-weight: bold; padding: 10px 20px">Chúc mừng!</h3>
                                <hr>
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
                <section class="tool-calculate">
                    <strong class="blue title">Công cụ tính khoản vay</strong>
                    <div class="box-shadow block block-range-slide">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="input-range">
                                        <strong>Giá trị bất động sản</strong>
                                        <input id="range_money" type="text" class="js-range-slider-money" name="range_money"/>
                                    </div>
                                    <div class="input-unit">
                                        <input type="text" id="input_range_money" value="@if(!is_null(request('loan_amount')) && request('loan_amount') !='') {{ request('loan_amount') / 1000000 }} @else 400 @endif">
                                        <span class="unit">Triệu</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-range">
                                        <strong>Tỉ lệ vay</strong>
                                        <input id="range_percent" type="text" class="js-range-slider-percent" name="range_percent"/>
                                    </div>
                                    <div class="input-unit">
                                        <input id="input_range_percent" type="text" value="@if(!is_null(request('loan_limit')) && request('loan_limit') !='') {{ request('loan_limit') }} @else 75 @endif">
                                        <span class="unit">%</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-range">
                                        <strong>Thời hạn vay</strong>
                                        <input id="range_year" type="text" class="js-range-slider-year" name="range_year"/>
                                    </div>
                                    <div class="input-unit">
                                        <input id="input_range_year" type="text" value="@if(!is_null(request('loan_time')) && request('loan_time') !='') {{ round(request('loan_time') / 12, 2) }} @else 5 @endif">
                                        <span class="unit">Năm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box-blue">
                                    <div class="show-info-money">
                                        <strong>Thanh toán tháng đầu</strong>
                                        <strong class="price" id="totalFirstMonth"></strong>
                                        <p class="ratio" id="infoCalculate"></p>
                                    </div>
                                    <ul class="list-info-money">
                                        <li class="item-blue">
                                            <div class="text">
                                                <p>Cần trả trước</p>
                                                <strong class="price" id="needPrepayment"></strong>
                                            </div>
                                        </li>
                                        <li class="item-yellow">
                                            <div class="text">
                                                <p>Gốc cần trả</p>
                                                <strong class="price" id="totalRoot"></strong>
                                            </div>
                                        </li>
                                        <li class="item-brown">
                                            <div class="text">
                                                <p>Lãi cần trả</p>
                                                <strong class="price" id="totalInterest"></strong>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-shadow block block-ls">
                        <div class="row">
                            <div class="col-md-6 block-one">
                                <div class="block">
                                    <strong class="title">Lãi suất ưu đãi</strong>
                                    <div class="group-gender form-group ">
                                        <div class="radio">
                                            <input type="radio" name="ls" id="raio1" checked=""> <label for="raio1">Theo ngân hàng</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="ls" id="radio2"> <label for="radio2">Tùy chỉnh</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">Ngân hàng Standard Charterted</option>
                                            <option value="">Ngân hàng Standard Charterted</option>
                                            <option value="">Ngân hàng Standard Charterted</option>
                                            <option value="">Ngân hàng Standard Charterted</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="block">
                                    <strong class="title">Hình thức thanh toán</strong>
                                    <div class="group-gender">
                                        <div class="radio">
                                            <input type="radio" name="ls" id="raio3" checked=""> <label for="raio3">Cả gốc lẫn lãi</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="ls" id="radio4"> <label for="radio4">Chỉ lãi</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <input id="check1" type="checkbox" name="check">
                                    <label for="check1">Thanh toán trước hạn  </label>
                                </div>
                                <div class="checkbox">
                                    <input id="check2" type="checkbox" name="check">
                                    <label for="check2">Ân hạn nợ gốc </label>
                                </div>
                                <div class="checkbox">
                                    <input id="check3" type="checkbox" name="check">
                                    <label for="check3">Hỗ trợ lãi suất  </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

@endsection

@section('after_styles')
    <style>
        .section{
            position: relative;
            width: 100%;
            display: block;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .full-height{
            min-height: 100vh;
        }

        [type="checkbox"]:checked,
        [type="checkbox"]:not(:checked){
            position: absolute;
            left: -9999px;
        }
        .modal-btn:checked + label,
        .modal-btn:not(:checked) + label{
            position: relative;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 15px;
            line-height: 2;
            transition: all 200ms linear;
            border-radius: 4px;
            letter-spacing: 1px;
            display: -webkit-inline-flex;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-align-items: center;
            -moz-align-items: center;
            -ms-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            -moz-justify-content: center;
            -ms-justify-content: center;
            justify-content: center;
            -ms-flex-pack: center;
            text-align: center;
            -ms-flex-item-align: center;
            align-self: center;
            border: none;
            cursor: pointer;
            background-color: #102770;
            color: #ffeba7;
            box-shadow: 0 12px 35px 0 rgba(16,39,112,.25);
        }
        .modal-btn:not(:checked) + label:hover{
            background-color: #ffeba7;
            color: #102770;
        }
        .modal-btn:checked + label .uil,
        .modal-btn:not(:checked) + label .uil{
            margin-left: 10px;
            font-size: 18px;
        }
        .modal-btn:checked + label:after,
        .modal-btn:not(:checked) + label:after{
            position: fixed;
            top: 100px;
            right: 30px;
            z-index: 110;
            width: 40px;
            border-radius: 3px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-size: 18px;
            background-color: #ffeba7;
            color: #102770;
            content: 'x';
            box-shadow: 0 12px 25px 0 rgba(16,39,112,.25);
            transition: all 200ms linear;
            opacity: 1;
            pointer-events: auto;
            transform: translateY(20px);
        }
        .modal-btn:checked + label:hover:after,
        .modal-btn:not(:checked) + label:hover:after{
            background-color: #102770;
            color: #ffeba7;
        }
        .modal-btn:checked + label:after{
            transition: opacity 300ms 300ms ease, transform 300ms 300ms ease, background-color 250ms linear, color 250ms linear;
            display: none;
            pointer-events: auto;
            transform: translateY(0);
        }
        .modal{
            position: fixed;
            display: block;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
            margin: 0 auto;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            overflow-x: hidden;
            background-color: rgba(31,32,41,.75);
            pointer-events: none;
            opacity: 1;
            transition: opacity 250ms 700ms ease;
        }
        .modal-btn:checked ~ .modal{
            pointer-events: auto;
            display: none;
            transition: all 300ms ease-in-out;
        }
        .modal-wrap {
            position: relative;
            display: block;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 4px;
            overflow: hidden;
            padding-bottom: 20px;
            background-color: #fff;
            -ms-flex-item-align: center;
            align-self: center;
            box-shadow: 0 12px 25px 0 rgba(199,175,189,.25);
            opacity: 1;
            transform: scale(1);
            transition: opacity 250ms 250ms ease, transform 300ms 250ms ease;
        }
        .modal-wrap img {
            display: block;
            width: 100%;
            height: auto;
        }
        .modal-wrap p {
            padding: 20px 30px 0 30px;
        }
        .modal-btn:checked ~ .modal .modal-wrap{
            opacity: 1;
            transform: scale(1);
            transition: opacity 250ms 500ms ease, transform 350ms 500ms ease;
        }


        .logo {
            position: absolute;
            top: 25px;
            left: 25px;
            display: block;
            z-index: 1000;
            transition: all 250ms linear;
        }
        .logo img {
            height: 26px;
            width: auto;
            display: block;
            filter: brightness(10%);
            transition: filter 250ms 700ms linear;
        }
        .modal-btn:checked ~ .logo img {
            filter: brightness(100%);
            transition: all 250ms linear;
        }


        @media screen and (max-width: 500px) {
            .modal-wrap {
                width: calc(100% - 40px);
                padding-bottom: 15px;
            }
            .modal-wrap p {
                padding: 15px 20px 0 20px;
            }
        }
    </style>
@endsection

@section('after_scripts')
    <script>
        //range data===
        let loan_amount = $('#input_range_money').val();
        let input_range_percent = $('#input_range_percent').val();
        let range_year = $('#input_range_year').val();
        $(".js-range-slider-money").ionRangeSlider({
            skin: "round",
            min: 0,
            max: 5000,
            from: loan_amount,
            step: 1,            // default 1 (set step)
            grid: true,         // default false (enable grid)
            postfix: "triệu",
            onChange: function (data) {
                $('#input_range_money').val(data.from);
                calculate();
            }
        });

        $(".js-range-slider-percent").ionRangeSlider({
            skin: "round",
            min: 0,
            max: 100,
            from: input_range_percent,
            step: 1,            // default 1 (set step)
            grid: true,         // default false (enable grid)
            postfix: "%",
            onChange: function (data) {
                $('#input_range_percent').val(data.from);
                calculate();
            }
        });

        $(".js-range-slider-year").ionRangeSlider({
            skin: "round",
            min: 0,
            max: 25,
            from: Math.ceil(range_year / 12),
            step: 1,            // default 1 (set step)
            grid: true,         // default false (enable grid)
            postfix: "năm",
            onChange: function (data) {
                $('#input_range_year').val(data.from);
                calculate();
            }
        });

        $('#input_range_money').on('change', function () {
            let instance = $(".js-range-slider-money").data("ionRangeSlider");
            if (parseInt($(this).val()) > instance.old_to) {
                $(this).val(instance.old_to);
            }
            instance.update({
                from: $(this).val()
            });
            calculate();
        });

        $('#input_range_percent').on('change', function () {
            let instance = $(".js-range-slider-percent").data("ionRangeSlider");
            if (parseInt($(this).val()) > instance.old_to) {
                $(this).val(instance.old_to);
            }
            instance.update({
                from: $(this).val()
            });
            calculate();
        });

        $('#input_range_year').on('change', function () {
            let instance = $(".js-range-slider-year").data("ionRangeSlider");
            if (parseInt($(this).val()) > instance.old_to) {
                $(this).val(instance.old_to);
            }
            instance.update({
                from: $(this).val()
            });
            calculate();
        });

        calculate();

        function calculate() {
            this.total = 0;
            this.totalRoot = 0;
            this.totalInterest = 0;
            const sumMoney = parseInt($('#range_money').data().from) || 0;
            const percent = parseFloat($('#range_percent').data().from) || 0;
            const year = parseInt($('#range_year').data().from) || 0;
            const interest_rate = parseFloat($('input[name="interest_rate"]').val()) || 0;
            const percent2 = parseFloat($('input[name="interestRateAfter"]').val()) || 0;

            //check value valid
            if (year === 0 || sumMoney === 0) {
                $('#needPrepayment').text('0đ');
                $('#totalRoot').text('0đ');
                $('#totalInterest').text('0đ');
                $('#totalFirstMonth').text('0VNĐ');
                $('#infoCalculate').text('Tỉ lệ vay ' + percent + '% - ' + year + ' năm - ' + interest_rate + '%/năm');
                return;
            }

            //calculate
            let needPrepayment = (sumMoney * 1000000) * (100 - percent)/100;
            let totalRoot = (sumMoney * 1000000) * percent/100;
            let totalFirstMonth = totalRoot/(year * 12) + (totalRoot * interest_rate/100)/12;

            let months = year * 12;
            let months2 = parseInt($('input[name="timeBorrowed"]').val()) || 1;

            let owed = totalRoot;
            const root = (owed / months);
            let interest = Math.round(owed / 12 * interest_rate / 100);
            if (months2 <= 0) {
                interest = Math.round(owed / 12 * percent2 / 100);
            }
            let principal = root + interest;
            for (let i = 0; i < months; i++) {
                owed = (owed - root);
                this.totalInterest += interest;
                this.totalRoot += root;
                if (months2 > 0 && i < months2 - 1) {
                    interest = Math.round(owed / 12 * interest_rate / 100)
                } else {
                    interest = Math.round(owed / 12 * percent2 / 100)
                }
                principal = root + interest;
            }
            this.total = formatNumber(Math.round(this.totalRoot) + Math.round(this.totalInterest));
            this.totalInterest = formatNumber(Math.round(this.totalInterest));

            $('#needPrepayment').text(formatNumber(needPrepayment) + 'đ');
            $('#totalRoot').text(formatNumber(totalRoot) + 'đ');
            $('#totalInterest').text(formatNumber(this.totalInterest) + 'đ');
            $('#totalFirstMonth').text(formatNumber(totalFirstMonth.toFixed(0)) + 'VNĐ');
            $('#infoCalculate').text('Tỉ lệ vay ' + percent + '% - ' + year + ' năm - ' + interest_rate + '%/năm');
        }

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
        }
    </script>
@endsection
