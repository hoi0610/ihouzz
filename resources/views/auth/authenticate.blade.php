@extends('layouts.master')
@section('body_class')
    refresh-page  page-header-static
@stop
@section('main_class')
    list-project-page
@stop
@section('content')
    <section class="wp-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="wrapper-block">
                        <h3 class="text-center">Xác thực thông tin tài khoản</h3>
                        <hr>
                        <div class="d-flex align-center my-4">
                            <div class="mr-3" style="width: 50px; height: 50px; border-radius: 50%">
                                <img src="https://cdn3.vectorstock.com/i/1000x1000/01/92/smartphone-sms-icon-vector-13820192.jpg" alt="">
                            </div>
                            <div>
                                <span>Một mã xác thực gồm 6 chữ số đã được gửi đến email <strong>...@exaple.com</strong> của bạn.Hãy kiểm tra tin nhắn và nhập lại vào ô dưới đây để hoàn tất.</span>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <form action="" method="post">
                                <div class="form-group d-flex justify-content-center my-5">
                                    <input type="text" name="code1" class="form-control text-center text-uppercase  code" style="width: 70px; height: 70px"  maxlength="1">
                                    <input type="text" name="code2" class="form-control text-center text-uppercase ml-3 code" style="width: 70px; height: 70px" readonly maxlength="1">
                                    <input type="text" name="code3" class="form-control text-center text-uppercase ml-3 code" style="width: 70px; height: 70px" readonly maxlength="1">
                                    <input type="text" name="code4" class="form-control text-center text-uppercase ml-3 code" style="width: 70px; height: 70px" readonly maxlength="1">
                                    <input type="text" name="code5" class="form-control text-center text-uppercase ml-3 code" style="width: 70px; height: 70px" readonly maxlength="1">
                                    <input type="text" name="code6" class="form-control text-center text-uppercase ml-3 code" style="width: 70px; height: 70px" readonly maxlength="1">
                                </div>
                                <p class="text-center">Không nhận được mã xác thực?</p>
                                <div class="text-center">
                                    <span>Gửi lại mã sau <strong id="r">27</strong>s</span> |
                                    <a href="#"><i class="fas fa-redo-alt mr-2"></i>Gửi lại</a>
                                </div>
                                <div class="text-center my-5">
                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after_scripts')
    <script>
        let time=27,
            r=document.getElementById('r'),
            tmp=time;
        setInterval(function(){
            let c=tmp--,
                m=(c/60)>>0,
                s=(c-m*60)+'';
            r.textContent= s
            tmp!=0||(tmp=time);
        },1000);
        $('input.code').keyup(function (e) {
            if (this.value.length == this.maxLength) {
                $(this).next('.code').focus();
                $(this).next('.code').attr('readonly', false);
            } else if(this.value.length == 0 && e.which == 8) {
                $(this).prev('.code').focus();
                $(this).attr('readonly', true);
            }
        })
    </script>
@endsection

