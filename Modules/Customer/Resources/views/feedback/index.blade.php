@extends('booking::layouts.eworkee',['header_back' => route('booking.index'),'header_title' => 'Góp ý, báo lỗi'])

@section('content')
    <main class="questions-page">
        <section class="gopy-baoloi">
            <div class="container">
                <form action="{{route('customer::feedback.store')}}" class="gopy form_feedback">
                    <div class="form-group">
                        <label for="">Nhập thông tin góp ý, báo lỗi</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Vui lòng nhập nội dung góp ý ( ít nhất 10 ký tự và không quá 500 ký tự)"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Mã bảo mật</label>
                        <div class="ip_inline">
                            <div class="ip">
                                <input type="text" id="captcha" name="captcha" class="form-control">
                                <label class="error" id="captcha-error" for="captcha"></label>
                            </div>
                            <div class="code div_captcha">
                                <img src="{{captcha_src('flat')}}" onclick="this.src='/captcha/flat?'+Math.random()" id="captchaCode" alt="" class="captcha">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary"> Gửi góp ý, báo lỗi </button>
                </form>
            </div>
        </section>


    </main>
    <div class="modal fade modal-contact" id="myModalContact" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-body">
                    <strong class="title">Cảm ơn bạn đã gửi góp ý/ báo lỗi đến Eworkee!</strong>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('after_styles')
    <style>
        .form_feedback .form-control{
            color: #000;
        }
    </style>
@stop

@section('after_scripts')
    <script src="/html/assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <script>
        $(function () {
            $("#myModalContact" ).unbind('hidden.bs.modal');
            $('#myModalContact').on('hidden.bs.modal', function(){
                location.reload();
            });

            $('.form_feedback').validate({
                rules: {
                    description:{
                        required:true,
                        minlength:10,
                        maxlength:500
                    },
                    captcha:'required'
                },
                messages: {
                    description:{
                        required:'Vui lòng nhập nội dung',
                        minlength:"Vui lòng nhập ít nhất 10 ký tự",
                        maxlength:"Vui lòng nhập không vướt quá 500 ký tự"
                    },
                    captcha:'Vui lòng nhập mã xác thực'
                },
                submitHandler: function(form) {
                    var action      = $(form).attr('action');
                    var formData    = $(form).serializeArray();
                    ajax_loading(true);
                    $.post(action,formData,function(response){
                        ajax_loading(false);
                        $('#captcha').val('');
                        $('.div_captcha img').trigger('click');
                        if(response.rs == 1)
                        {
                            $('#myModalContact').modal('show');
                        } else {

                            $.each(response.errors, function (key, msg) {
                                $('#'+key+'-error').html(msg).show();
                            });
                        }

                    }).fail(function () {
                        ajax_loading(false);

                    });
                    return false;
                }
            })
        });
    </script>
@stop
