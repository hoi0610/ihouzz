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
        ['link' => '#', 'name' => 'Quy hoạch']
    ]])
    <section class="select-info-quy-hoach">
        <div class="container">
            <h2 class="title-block">Xem quy hoạch bất động sản</h2>
            <p>Xem bản đồ quy hoạch bất động sản với hệ thống dữ liệu bản đồ linh hoạt, chính xác, đầy đủ nhất Việt Nam</p>
            <div class="select-info-search row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Tỉnh/ Thành phố</label>
                        <select name="" id="" class="form-control">
                            <option value="">Tp. Hồ Chí Minh</option>
                            <option value="">Tp. Hồ Chí Minh</option>
                            <option value="">Tp. Hồ Chí Minh</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Quận/ Huyện</label>
                        <select name="" id="" class="form-control">
                            <option value="">Chọn Quận/ Huyện</option>
                            <option value="">Quận 1</option>
                            <option value="">Quận 1</option>
                            <option value="">Quận 1</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Phường/ Xã</label>
                        <select name="" id="" class="form-control">
                            <option value="">Chọn Phường/ Xã</option>
                            <option value="">Quận 1</option>
                            <option value="">Quận 1</option>
                            <option value="">Quận 1</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="">&nbsp;</label>
                    <a class="btn btn-search btn-secondary" onclick="openChooseTime()"><i class="fas fa-search"></i> Xem bản đồ quy hoạch</a>
                </div>

            </div>
        </div>
    </section>

    <div class="show-account-money block hidden show-choose-time">
        <div class="container">
            <strong class="title">Tài khoản iHouzz Pay của bạn hiện có: <span class="red">200.000đ</span></strong>
            <a href="#" class="input-money">
                <img src="/html/assets/images/icons/wallet.png" alt="">
                Nạp tiền
            </a>
        </div>
    </div>

    <div class="block block-choose-time-package hidden show-choose-time">
        <div class="container">
            <p>Vui lòng chọn gói thời gian để xem bản đồ quy hoạch</p>
            <div class="choose-time-package">
                <strong>Chọn thời gian</strong>
                <div class="row">
                    <div class="col-md-4">
                        <select name="" id="" class="form-control">
                            <option value="">5 phút</option>
                            <option value="">15 phút</option>
                            <option value="">25 phút</option>
                            <option value="">35 phút</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="inline-ip">
                            <span class="text">Tương đương</span>
                            <div class="ip">
                                <input type="text" class="form-control" placeholder="" value="5.000đ">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-search btn-secondary" onclick="openViewPlan()"><i class="fas fa-search"></i> Xem bản đồ quy hoạch</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="list-ward-quyhoach block hidden view-quyhoach">
        <div class="container">
            <p class="show-ward">Bạn đang xem bản đồ quy hoạch của : <b>Thành Phố Hồ Chí Minh  > Quận 1 > Phường Bến Nghé</b></p>

            <ul class="list-ward row">
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Bến Nghé</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Bến Thành</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Cô Giang</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Phạm Ngũ Lão</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Tân Định</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Bến Nghé</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Bến Nghé</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Bến Nghé</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Bến Nghé</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Bến Nghé</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Bến Nghé</a></li>
                <li class="col-md-3 col-xs-6 item"><a href="#">Phường Bến Nghé</a></li>
            </ul>
        </div>
    </div>

    <div class="show-map-quyhoach block hidden view-quyhoach">
        <div class="container">
            <div class="show-time">
                <p>Thời gian xem bản đồ quy hoạch còn lại của bạn:</p>
                <span id="remainingTime" class="countdown"></span>
            </div>
            <div class="show-map">
                <img src="/html/assets/images/map-quyhoach.png" alt="">
            </div>
        </div>
    </div>

    <div class="warning-message">
        <div class="container">
            <strong class="title">
                <span class="icon"><i class="fas fa-exclamation-triangle"></i></span>
                Lưu ý
            </strong>

            <div class="content default-plan">
                <p>- Chúng tôi đang cập nhật bản đồ quy hoạch của những khu vực còn thiếu</p>
                <p>- Bạn phải đăng nhập tài khoản để xem được quy hoạch</p>
                <p>- Bản đồ quy hoạch có thể được thay đổi bởi cơ quan nhà nước</p>
                <p>- Để chắc chắn hơn , bạn nên liên hệ với cơ quan quản lý quy hoạch hay liên hệ trực tiếp với iHouzz để được tư vấn thêm</p>
            </div>

            <div class="content show-choose-time hidden">
                <p>- Có 5 mức thời gian để bạn lựa chọn. Bạn nên cân nhắc chọn gói thời gian để xem bản đồ quy hoạch hiệu quả nhất</p>
                <p>- Nếu bạn không sử dụng hết thời gian xem bản đồ quy hoạch theo gói bạn đã chọn, bạn sẽ vẫn bị trừ tiền theo gói dịch vụ đó</p>
                <p>- Một số khu vực chúng tôi chưa có bản đồ. Bn5 nên kiểm tra khu vực cần xem trong danh sách lọc theo tỉnh/ Thành phố mà chúng tôi đã cung cấp, trước khi quyết định mua gói dịch vụ nào. </p>
                <i class="red">VD: Bạn chọn mua gói dịch vụ 5 phút (5.000đ), Nếu bạn chỉ xem bản đồ quy hoạch trong 2 phút, sau đó thoát ra thì vẫn bị trừ 5.000đ theo gói dịch vụ bạn đã chọn. </i>
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')
    <script>
        function openChooseTime()
        {
            $('.show-choose-time').removeClass('hidden');
            $('.default-plan').addClass('hidden');
        }

        function openViewPlan()
        {
            $('.show-choose-time').addClass('hidden');
            $('.view-quyhoach').removeClass('hidden');
            $('.default-plan').removeClass('hidden');
        }
    </script>
@stop


