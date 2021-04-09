@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    <section class="wrap-loan-package">
        <div class="container">
            <div class="main-content loan-package fn_compare-detail">
                <ul class="list-bank_comparing" style="justify-content: flex-start;">
                    <li>
                        <div class="bank-compare"></div>
                        <div class="type">
                            <div class="guide-btn">
                                <div class="icn btn-faq">
                                    <div class="icn btn-faq">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0C3.6 0 0 3.6 0 8C0 12.4 3.6 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0ZM8 13C7.4 13 7 12.6 7 12C7 11.4 7.4 11 8 11C8.6 11 9 11.4 9 12C9 12.6 8.6 13 8 13ZM9.5 8.4C9 8.7 9 8.8 9 9V10H7V9C7 7.7 7.8 7.1 8.4 6.7C8.9 6.4 9 6.3 9 6C9 5.4 8.6 5 8 5C7.6 5 7.3 5.2 7.1 5.5L6.6 6.4L4.9 5.4L5.4 4.5C5.9 3.6 6.9 3 8 3C9.7 3 11 4.3 11 6C11 7.4 10.1 8 9.5 8.4Z" fill="#76809A">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Ưu đãi</div>
                        </div>
                        <div class="type">
                            <div class="guide-btn">
                                <div class="icn btn-faq">
                                    <div class="icn btn-faq">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0C3.6 0 0 3.6 0 8C0 12.4 3.6 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0ZM8 13C7.4 13 7 12.6 7 12C7 11.4 7.4 11 8 11C8.6 11 9 11.4 9 12C9 12.6 8.6 13 8 13ZM9.5 8.4C9 8.7 9 8.8 9 9V10H7V9C7 7.7 7.8 7.1 8.4 6.7C8.9 6.4 9 6.3 9 6C9 5.4 8.6 5 8 5C7.6 5 7.3 5.2 7.1 5.5L6.6 6.4L4.9 5.4L5.4 4.5C5.9 3.6 6.9 3 8 3C9.7 3 11 4.3 11 6C11 7.4 10.1 8 9.5 8.4Z" fill="#76809A">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Lãi suất ưu đãi ban đầu</div>
                        </div>
                        <div class="type">
                            <div class="guide-btn">
                                <div class="icn btn-faq">
                                    <div class="icn btn-faq">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0C3.6 0 0 3.6 0 8C0 12.4 3.6 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0ZM8 13C7.4 13 7 12.6 7 12C7 11.4 7.4 11 8 11C8.6 11 9 11.4 9 12C9 12.6 8.6 13 8 13ZM9.5 8.4C9 8.7 9 8.8 9 9V10H7V9C7 7.7 7.8 7.1 8.4 6.7C8.9 6.4 9 6.3 9 6C9 5.4 8.6 5 8 5C7.6 5 7.3 5.2 7.1 5.5L6.6 6.4L4.9 5.4L5.4 4.5C5.9 3.6 6.9 3 8 3C9.7 3 11 4.3 11 6C11 7.4 10.1 8 9.5 8.4Z" fill="#76809A">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Thời gian áp dụng ưu đãi</div>
                        </div>
                        <div class="type">
                            <div class="guide-btn">
                                <div class="icn btn-faq">
                                    <div class="icn btn-faq">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0C3.6 0 0 3.6 0 8C0 12.4 3.6 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0ZM8 13C7.4 13 7 12.6 7 12C7 11.4 7.4 11 8 11C8.6 11 9 11.4 9 12C9 12.6 8.6 13 8 13ZM9.5 8.4C9 8.7 9 8.8 9 9V10H7V9C7 7.7 7.8 7.1 8.4 6.7C8.9 6.4 9 6.3 9 6C9 5.4 8.6 5 8 5C7.6 5 7.3 5.2 7.1 5.5L6.6 6.4L4.9 5.4L5.4 4.5C5.9 3.6 6.9 3 8 3C9.7 3 11 4.3 11 6C11 7.4 10.1 8 9.5 8.4Z" fill="#76809A">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Lãi suất sau ưu đãi</div>
                        </div>
                        <div class="type">
                            <div class="guide-btn">
                                <div class="icn btn-faq">
                                    <div class="icn btn-faq">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0C3.6 0 0 3.6 0 8C0 12.4 3.6 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0ZM8 13C7.4 13 7 12.6 7 12C7 11.4 7.4 11 8 11C8.6 11 9 11.4 9 12C9 12.6 8.6 13 8 13ZM9.5 8.4C9 8.7 9 8.8 9 9V10H7V9C7 7.7 7.8 7.1 8.4 6.7C8.9 6.4 9 6.3 9 6C9 5.4 8.6 5 8 5C7.6 5 7.3 5.2 7.1 5.5L6.6 6.4L4.9 5.4L5.4 4.5C5.9 3.6 6.9 3 8 3C9.7 3 11 4.3 11 6C11 7.4 10.1 8 9.5 8.4Z" fill="#76809A">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Tỷ lệ vay</div>
                        </div>
                        <div class="type">
                            <div class="guide-btn">
                                <div class="icn btn-faq">
                                    <div class="icn btn-faq">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0C3.6 0 0 3.6 0 8C0 12.4 3.6 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0ZM8 13C7.4 13 7 12.6 7 12C7 11.4 7.4 11 8 11C8.6 11 9 11.4 9 12C9 12.6 8.6 13 8 13ZM9.5 8.4C9 8.7 9 8.8 9 9V10H7V9C7 7.7 7.8 7.1 8.4 6.7C8.9 6.4 9 6.3 9 6C9 5.4 8.6 5 8 5C7.6 5 7.3 5.2 7.1 5.5L6.6 6.4L4.9 5.4L5.4 4.5C5.9 3.6 6.9 3 8 3C9.7 3 11 4.3 11 6C11 7.4 10.1 8 9.5 8.4Z" fill="#76809A">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Thời gian cho vay</div>
                        </div>
                        <div class="type">
                            <div class="guide-btn">
                                <div class="icn btn-faq">
                                    <div class="icn btn-faq">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 0C3.6 0 0 3.6 0 8C0 12.4 3.6 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0ZM8 13C7.4 13 7 12.6 7 12C7 11.4 7.4 11 8 11C8.6 11 9 11.4 9 12C9 12.6 8.6 13 8 13ZM9.5 8.4C9 8.7 9 8.8 9 9V10H7V9C7 7.7 7.8 7.1 8.4 6.7C8.9 6.4 9 6.3 9 6C9 5.4 8.6 5 8 5C7.6 5 7.3 5.2 7.1 5.5L6.6 6.4L4.9 5.4L5.4 4.5C5.9 3.6 6.9 3 8 3C9.7 3 11 4.3 11 6C11 7.4 10.1 8 9.5 8.4Z" fill="#76809A">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="text">Phí trả nợ trước hạn</div>
                        </div>
                    </li>
                    @if(!empty($data))
                    @foreach($data as $item)
                    <li>
                        <div class="bank-compare">
                            <div class="info">
                                <div class="images item-loan {{ $item['bank']['logo_class_color'] }}">
                                    <div class="logo-compare">
                                        <img src="{{ $item['bank']['logo'] }}" alt="">
                                    </div>
                                </div>
                                <div class="name">{{$item['bank']['name']}}</div>
                            </div>
                        </div>
                        <div class="bank_service customScrollBar">{{$item['description']}}</div>
                        <div class="bank_service customScrollBar">{{$item['interest_per_year']}} %</div>
                        <div class="bank_service customScrollBar">{{$item['preferential_time']}} tháng</div>
                        <div class="bank_service customScrollBar">{{$item['interest_rate_after_incentive']}}</div>
                        <div class="bank_service customScrollBar">{{$item['loan_rate']}} %</div>
                        <div class="bank_service customScrollBar">{{$item['loan_period']/12}} năm</div>
                        <div class="bank_service customScrollBar">{{$item['registration_fee_payment'] }}</div>
                        <div class="bank_service fnc-btn">
                            <a href="{{ route('goi-vay.chitiet', $item['id']) }}" class="detail btn_fnc" style="cursor: pointer;">Chi tiết</a>
                            <a class="advisory btn_fnc" style="cursor: pointer;" data-toggle="modal" data-target="#advisoryModal">Tư vấn</a>
                        </div>
                    </li>
                    @endforeach
                    @endif
                    <li>
                        <div class="bank-compare">
                            <a class="add-bank" style="cursor: pointer;" href="{{ route('goi-vay.index') }}">
                                <span class="icn">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#add)"><path d="M12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21509 0.913451 7.4078C0.00519943 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.8071 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0866C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6935 24 14.3734 24 12C23.9908 8.82024 22.7235 5.77336 20.4751 3.52492C18.2266 1.27648 15.1798 0.00923395 12 0V0ZM18 13H13V18H11V13H6.00001V11H11V6H13V11H18V13Z" fill="#0A3ECA">
                                            </path>
                                        </g>
                                    </svg>
                                </span>
                                <span class="txt">Thêm gói vay <br> để so sánh</span>
                            </a>
                        </div>
                        <div class="bank_service customScrollBar" style="overflow: unset;"><div class="none">-</div></div>
                        <div class="bank_service customScrollBar" style="overflow: unset;"><div class="none">-</div></div>
                        <div class="bank_service customScrollBar" style="overflow: unset;"><div class="none">-</div></div>
                        <div class="bank_service customScrollBar" style="overflow: unset;"><div class="none">-</div></div>
                        <div class="bank_service customScrollBar" style="overflow: unset;"><div class="none">-</div></div>
                        <div class="bank_service customScrollBar" style="overflow: unset;"><div class="none">-</div></div>
                        <div class="bank_service customScrollBar" style="overflow: unset;"><div class="none">-</div></div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="modal fade advisoryModal" id="advisoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bank-model">
                    <form>
                        <div class="register-loans content-loans pl-4 pr-4">
                            <h3>Đăng ký nhận tư vấn</h3>
                            <div class="content" style="flex-direction: column;">
                                <div class="column">
                                    <div class="step">
                                        <div class="icn">1</div>
                                        <div class="txt">Thông tin tư vấn</div>
                                    </div>
                                    <div class="form_loans">
                                        <div class="form-input pb-2">
                                            <div class="label-name">Gói vay</div>
                                            <span class="contentInfo">Nhà có sổ | Standard Chartered | Lãi suất 7.89% | Cố định 36 tháng</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="step">
                                        <div class="icn">2</div>
                                        <div class="txt">Thông tin khách hàng</div>
                                    </div>
                                    <div class="form_loans">
                                        <div class="form-input">
                                            <div class="label-name">Tên khách hàng *</div>
                                            <input type="text" class="input_loans" name="fullName">
                                        </div>
                                        <div class="form-input">
                                            <div class="label-name">Số điện thoại *</div>
                                            <input type="text" class="input_loans" name="phoneNumber">
                                        </div>
                                        <div class="form-input">
                                            <div class="label-name">Email</div>
                                            <input type="email" class="input_loans" name="email" placeholder="Email (Tùy chọn)">
                                        </div>
                                        <div class="form-input">
                                            <div class="label-name">Ghi chú</div>
                                            <textarea class="input_loans" name="note"
                                                  placeholder="Mã căn&#13;&#10;Tên nhân viên Môi giới BĐS&#13;&#10;Khác" style="height: 80px; line-height: 23px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="submit_btn" style="cursor: pointer;">Gửi thông tin ngay</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


