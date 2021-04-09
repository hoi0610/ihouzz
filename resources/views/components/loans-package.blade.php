<section class="loan-package hightlight-bg">
    <div class="container">
        <div class="line-title">
            <div class="left-content">
                <h3 class="title-block">Gói vay mua nhà nổi bật</h3>
                <p>Lãi suất ưu đãi cho nhà phố, chung cư, đất nền.</p>
            </div>
            <a href="{{ route('goi-vay.index') }}" class="view-all">Xem tất cả</a>
        </div>
        <div class="content">
            <div class="row">
            @if(!empty($loanPackageHot))
                @foreach($loanPackageHot as $key => $item)
                    <div class="col-lg-3">
                        <div class="item-loan">
                            <div class="head">
                                <img src="/html/assets/images/logo-homeloan.png" alt="">
                                <label class="checkbox ">
                                    So sánh
                                    <input class="checkbox-compare" type="checkbox" id="compare-{{ $item['id'] }}" name="" value="{{ $item['id'] }}"> <span></span>
                                </label>
                            </div>
                            <div class="body">
                                <p>{{ $item['title'] }}</p>
                                <p class="hightlight"><span>{{ $item['description'] }}</span></p>
                                <div class="box-loan">
                                    <div class="percent">
                                        Lãi suất <strong class="num">{{ $item['interest_per_year'] }}%</strong> năm
                                    </div>
                                    <div class="percent">
                                        Ưu đãi <strong class="num">{{ $item['preferential_time'] }}</strong> tháng
                                    </div>
                                </div>
                                <a href="#">Yêu cầu tư vấn gói vay này</a>
                                <a href="#" class="detail">Xem chi tiết ></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

                <div class="col-lg-6">
                    <livewire:form-caculate-loan-amount :allLoanPackage="$allLoanPackage" layout="layout1"/>
                </div>
            </div>
        </div>
    </div>

    <div class="compare-group">
        <form method="post" action="{{route('goi-vay.compare')}}" enctype="multipart/form-data">
            @csrf
        <div class="w1100">
            <div class="flx-compare">
                <ul class="list-compare">
                    <li>
                        <div class="bank-compare">
                            <div class="note">Vui lòng <br>chọn khoản vay</div>
                        </div>
                    </li>
                    <li>
                        <div class="bank-compare">
                            <div class="note">Vui lòng <br>chọn khoản vay</div>
                        </div>
                    </li>
                    <li>
                        <div class="bank-compare">
                            <div class="note">Vui lòng <br>chọn khoản vay</div>
                        </div>
                    </li>
                    <li>
                        <div class="bank-compare">
                            <div class="note">Vui lòng <br>chọn khoản vay</div>
                        </div>
                    </li>
                </ul>
                <input type="hidden" name="ids"/>
                <div class="funcs-btn">
                    <button type="submit" class="btn comparing-btn">So sánh khoản vay</button>
                    <button type="button" class="btn cancel-btn" id="btn-drop-loan">Bỏ chọn tất cả</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>

<div id="append-div" style="display: none">
    <div class="bank-compare">
        <a class="remove-btn" style="cursor: pointer;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.6">
                    <path d="M16.5 8.5L8.5 16.5" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M16.5 16.5L8.5 8.5" stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12.5 23.5C18.5751 23.5 23.5 18.5751 23.5 12.5C23.5 6.42487 18.5751 1.5 12.5 1.5C6.42487 1.5 1.5 6.42487 1.5 12.5C1.5 18.5751 6.42487 23.5 12.5 23.5Z"
                          stroke="white" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
        </a>
        <div class="info-banks">
            <div class="item-loan">
                <div class="head">
                    <img class="append-div-image" src="/html/assets/images/logo-standar.png" alt="">
                </div>
                <div class="body">
                    <div class="box-loan append-div-box">
                        <div class="percent">
                            Lãi suất <strong class="num">5.99%</strong> 12 tháng
                        </div>
                        <div class="percent">
                            Ưu đãi <strong class="num">12</strong> tháng
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


