@extends('layouts.master')

@section('body_class', 'refresh-page  page-header-static')
@section('main_class', 'news-page')

@section('content')
    @include('includes.breadcrumb', ['breadcrumb' => [
        ['link' => route('home.index'), 'name' => 'IHouzz'],
        ['link' => '#', 'name' => 'Quản lý tài khoản']
    ]])

    <section class="manage-account">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('account.includes.side-bar')
                </div>
                <div class="col-md-9">
                    <div class="box box-account-info">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-tab-1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Thông tin tài khoản Ihouzz Pay</a>
                                <a class="nav-item nav-link" id="nav-tab-2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Lịch sử giao dịch</a>
                            </div>
                        </nav>
                        <div class="tab-content px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-tab-1">
                                <div class="content-account-pay">
                                    <div class="top__content">
                                        <p class="red">Tài khoản iHouzz hiện có của bạn là: 100.000đ</p>
                                    </div>
                                    <div class="block block-bank">
                                        <strong class="sub-title">Nạp tiền vào tài khoản</strong>

                                        <div class="group-pay-choose body">
                                            <div class="group-bank">
                                                <div class="radio">
                                                    <input type="radio" name="pay" id="bank" checked=""> <label for="bank">Thanh toán online bằng thẻ ngân hàng nội địa</label>
                                                </div>

                                                <div class="box box-bank">
                                                    <p><span class="red">Lưu ý:</span> Bạn cần đăng ký internet - Banking hoặc dịch vụ thanh toán trực tuyến tại ngân hàng trước khi thực hiện</p>

                                                    <div class="choose-bank">
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank1" checked="">
                                                            <label for="bank1"><img src="/html/assets/images/vcb.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank2" checked="">
                                                            <label for="bank2"><img src="/html/assets/images/scb.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank3" checked="">
                                                            <label for="bank3"><img src="/html/assets/images/scb_.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank4" checked="">
                                                            <label for="bank4"><img src="/html/assets/images/vtb.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank5" checked="">
                                                            <label for="bank5"><img src="/html/assets/images/acb.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank6" checked="">
                                                            <label for="bank6"><img src="/html/assets/images/exb.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank7" checked="">
                                                            <label for="bank7"><img src="/html/assets/images/agrib.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank8" checked="">
                                                            <label for="bank8"><img src="/html/assets/images/tpb.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank9" checked="">
                                                            <label for="bank9"><img src="/html/assets/images/lvb.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank10" checked="">
                                                            <label for="bank10"><img src="/html/assets/images/vcpt.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank11" checked="">
                                                            <label for="bank11"><img src="/html/assets/images/msb.png" alt=""></label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bank" id="bank12" checked="">
                                                            <label for="bank12"><img src="/html/assets/images/ocb.png" alt=""></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="group-card">
                                                <div class="radio">
                                                    <input type="radio" name="pay" id="visa"> <label for="visa">Thanh toán bằng thẻ Visa hoặc MasterCard</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="block block-money">
                                        <strong class="sub-title">Số tiền nạp</strong>
                                        <div class="choose-money body">
                                            <div class="radio">
                                                <input type="radio" name="money" id="mon1" checked="">
                                                <label for="mon1">100.000đ</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="money" id="mon2" checked="">
                                                <label for="mon2">200.000đ</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="money" id="mon3" checked="">
                                                <label for="mon3">500.000đ</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="money" id="mon4" checked="">
                                                <label for="mon4">1.000.000đ</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="money" id="mon5" checked="">
                                                <label for="mon5">Số tiền khác</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group group-input-icon">
                                        <label for="">Nội dung <span class="red">*</span></label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <button class="btn btn-primary">Nạp tiền</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-tab-2">
                                <div class="content-account-pay">
                                    <div class="top__content">
                                        <p class="red">Tài khoản iHouzz hiện có của bạn là: 100.000đ</p>
                                        <a href="#" class="btn btn-border">Nạp tiền vào tài khoản</a>
                                    </div>
                                    <form action="" class="form-account block">
                                        <div class="form-group group-input-icon">
                                            <label for="">Loại giao dịch</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Xem bản đồ quy hoạch - 1 Giờ</option>
                                                <option value="">Xem bản đồ quy hoạch - 1 Giờ</option>
                                                <option value="">Xem bản đồ quy hoạch - 1 Giờ</option>
                                            </select>
                                        </div>
                                        <div class="form-group group-input-icon">
                                            <label for="">Ngày bắt đầu<span class="red">*</span></label>
                                            <input type="text" class="form-control DatePicker" placeholder="" value="23/01/2021 -  08:55:32">
                                            <span class="icon"><img src="/html/assets/images/icons/calendar.png" alt=""></span>
                                        </div>
                                        <div class="form-group group-input-icon">
                                            <label for="">Ngày kết thúc<span class="red">*</span></label>
                                            <input type="text" class="form-control DatePicker" placeholder="" value="23/01/2021 -  08:55:32">
                                            <span class="icon"><img src="/html/assets/images/icons/calendar.png" alt=""></span>
                                        </div>
                                        <button class="btn btn-primary">Tìm kiếm</button>
                                    </form>

                                    <div class="table-history">
                                        <strong class="title-table">Lịch sử giao dịch</strong>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-color">
                                                <tr>
                                                    <th scope="col">Ngày</th>
                                                    <th scope="col">Loại giao dịch</th>
                                                    <th scope="col">Nội dung</th>
                                                    <th scope="col">Số tiền</th>
                                                    <th scope="col">Số dư</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>23/01/2021-08:55:32</td>
                                                    <td>Xem bản đồ quy hoạch- 1 Giờ</td>
                                                    <td>Xem bản đồ quy hoạch- 1 Giờ</td>
                                                    <td>-15.000đ</td>
                                                    <td>35.000đ</td>
                                                </tr>
                                                <tr>
                                                    <td>23/01/2021-08:55:32</td>
                                                    <td>Xem bản đồ quy hoạch- 1 Giờ</td>
                                                    <td>Xem bản đồ quy hoạch- 1 Giờ</td>
                                                    <td>-15.000đ</td>
                                                    <td>35.000đ</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after_scripts')
    <script src="/html/assets/js/jquery.validate.min.js" type="text/javascript"></script>

    <script>
        $(function() {
            add_rule_phone_number();
            $('#frm_info').validate({
                ignore: ".ignore",
                rules:{
                    'name': {
                        required: true
                    },
                    'phone': {
                        required: true,
                        minlength: 10,
                        maxlength: 11,
                        rgphone: true
                    },
                    'email': {
                        required: true,
                        email: true
                    }
                },
                messages:{
                    'name': {
                        required: '{!! __('customer.name_input') !!}'
                    },
                    'phone': {
                        required: '{!! __('customer.phone_input') !!}',
                        minlength: "{!! __('customer.phone_input_min') !!}",
                        maxlength: "{!! __('customer.name_input_max') !!}",
                    },
                    'email': {
                        required: '{!! __('customer.email_input') !!}',
                        email: '{!! __('customer.email_input_invalidate') !!}'
                    },
                    'old-password': {
                        required: '{!! __('customer.password_old_input') !!}'
                    },
                    'password': {
                        required: '{!! __('customer.password_new_input') !!}',
                        minlength: "{!! __('customer.password_input_min') !!}",
                    },
                    're-password':{
                        equalTo:'{!! __('customer.repassword_input_not_match') !!}'
                    }
                },
                submitHandler: function(form, e) {
                    e.preventDefault();
                    var data= new FormData(form);
                    var files = $('#file-input')[0].files[0];
                    if (files!=undefined) {
                        data.append('avatar_file', files);
                    }

                    var url = $(form).attr('action');
                    ajax_loading(true);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: "JSON",
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function (data, status)
                        {
                            ajax_loading(false);
                            if(data.rs){
                                alert_success(data.msg, '{!! __('customer.account_information_update') !!}', function(){
                                    location.reload();
                                });
                            }else{
                                if (data.errors) {
                                    $.each(data.errors, function (key, msg) {
                                        $('#'+key+'-error').html(msg).show();
                                    });
                                }
                            }
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@stop
