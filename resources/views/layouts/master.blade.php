<!DOCTYPE html>
<?php
use Illuminate\Support\Str;

$ver_js = \App\Helpers\General::get_version_js();
$ver_css = \App\Helpers\General::get_version_css();
$settings = \App\Helpers\General::get_settings();
?>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="fb:app_id" content="<?=@$settings['fb_app_id']['value']?>"/>
    @if (trim($__env->yieldContent('og_title')))
        <meta property="og:title" content="@yield('og_title', @$settings['og_title']['value'])"/>
    @else
        <meta property="og:title" content="<?=@$settings['og_title']['value']?>"/>
    @endif
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="vi_VN"/>
    @if (trim($__env->yieldContent('og_image')))
        <meta property="og:image" content="@yield('og_image', url(@$settings['og_image']['value']))"/>
    @elseif(!empty($settings['og_image']['value']))
        <meta property="og:image" content="<?=url(@$settings['og_image']['value'])?>"/>
    @endif

    @if (trim($__env->yieldContent('og_description')))
        <meta property="og:description" content="@yield('og_description', @$settings['og_description']['value'])"/>
    @else
        <meta property="og:description" content="<?=@$settings['og_description']['value']?>"/>
    @endif

    @if (trim($__env->yieldContent('keywords')))
        <meta name="keywords" content="@yield('keywords')"/>
    @else
        <meta name="keywords" content="<?=@$settings['og_keywords']['value']?>"/>
    @endif
    @if (trim($__env->yieldContent('og_description')))
        <meta name="description" content="@yield('og_description', @$settings['og_description']['value'])"/>
    @else
        <meta name="description" content="<?=@$settings['og_description']['value']?>"/>
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@if(isset($title)) {{$title.' :: '.config('app.name')}} @elseif (trim($__env->yieldContent('title'))) @yield('title', __('common.home')){{' :: '.config('app.name')}} @else {{$settings['og_title']['value'].' :: '.config('app.name')}} @endif </title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/html/assets/css/all.css" rel="stylesheet">
    <link href="/html/assets/css/animate.css" rel="stylesheet">
    <link href="/html/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="/html/assets/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/html/assets/css/ion.rangeSlider.min.css" rel="stylesheet">
    <link href="/html/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="/html/assets/css/slick.css" rel="stylesheet">
    <livewire:styles />
    <livewire:scripts />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <link href="/html/assets/css/custom.css?v={{$ver_css}}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="<?=$settings['favicon_ico']['value'] ?? 'favicon.png'?>" type="image/x-icon" sizes="16x16">


    <script>
        var _base_url = '{{url('/')}}';
        var _path = '{{ env('API_BASE_URL') }}';
        var $locale = '{{config('app.locale')}}';
    </script>
    <link href="{{ asset('/html/assets/css/style.css?v='.$ver_css) }}" rel="stylesheet">
    @yield('after_styles')
    <?php \App\Helpers\General::get_scripts_include('head'); ?>
</head>

<body class="@yield('body_class', 'refresh-page')">
    <div class="overally"></div>

<!--header-->
@include('includes.header')

<div class="m-nav">
    <div class="nav-ct">
        <button class="nav-close c-site-nav__close">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

    <!--page-container-->
    <main class="@yield('main_class', 'homepage')">
        @yield('content')

        <x-loans-package />

        <livewire:view-quick />

        <livewire:view-overall />

        @include('includes.industry-poverty')
    </main>

    <!--footer-->
    @include('includes.footer')

    <!--script-->
    <script src="/html/assets/js/lib/jquery.js" type="text/javascript"></script>
    <script src="/html/assets/js/lib/bootstrap.min.js" type="text/javascript"></script>
    <script src="/html/assets/js/lib/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="/html/assets/js/lib/all.js" type="text/javascript"></script>
    <script src="/html/assets/js/lib/slick.min.js" type="text/javascript"></script>
    <script src="/html/assets/js/lib/Chart.min.js" type="text/javascript"></script>
    <script src="/html/assets/js/lib/utils.js" type="text/javascript"></script>
    <script src="/html/assets/js/lib/ion.rangeSlider.min.js" type="text/javascript"></script>
    <script src="/html/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="/html/assets/js/lib/URI.min.js" type="text/javascript"></script>
	<script src="/html/assets/js/function.js?v={{$ver_js}}" type="text/javascript"></script>
	<script src="/html/assets/js/common.js?v={{$ver_js}}" type="text/javascript"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        $(function(){
            $('.checkbox-compare').on('change', function () {

                if($('.checkbox-compare:checked').length > 0 && $('.compare-group.active').length == 0) {
                    $('.compare-group').addClass('active')
                } else if($('.checkbox-compare:checked').length == 0) {
                    $('.compare-group').removeClass('active');
                }

                let id = $(this).attr('id');
                if($(this).is(':checked')) {
                    let image = $(this).parents('.head').find('img').attr('src');
                    let data1 = $(this).parents('.item-loan').find('.box-loan');
                    appendDiv(image, data1, id);
                } else {
                    let ids = id.split("-");
                    remove(ids[1]);
                }
            });

            $('.list-compare').on( 'click', '.remove-btn',function () {
                let id = $(this).parents('li').attr('id');
                let ids = id.split("-");

                $('#compare-' + ids[1]).prop( "checked" , false);
                remove(ids[1]);

                if($('.checkbox-compare:checked').length == 0) {
                    $('.compare-group').removeClass('active');
                }
            });

            function appendDiv (image, data1, id) {
                let ids = id.split("-");
                id = ids[1];
                $('#append-div').find('.append-div-image').attr('src', image);
                $('#append-div').find('.append-div-box').html( data1.html() );
                let div = $('.list-compare').find('.note').first().parent().parent();

                div.attr('id', 'subcompare-' + id);
                $('.funcs-btn').append("<input type='hidden' id="+id+" name='ids[]' value="+id+" />")
                div.html( $('#append-div').html() );
                //set session
                let data = JSON.parse(sessionStorage.getItem('ids')) ?? [];
                let infoItem = {};
                infoItem['id'] = id;
                infoItem['image'] = image;
                infoItem['data1'] = data1.html();
                data.push(infoItem);
                if ($('.list-package').length > 0) {
                    sessionStorage.setItem("ids", JSON.stringify(data));
                }
            }

            function remove(id) {
                $('#subcompare-' + id).remove();
                $('.list-compare').append('<li>' +
                    '<div class="bank-compare">' +
                    '<div class="note">Vui lòng <br>chọn khoản vay</div>' +
                    '</div></li>')

                $('.funcs-btn').find('#' + id).remove();

                //set session
                let data = JSON.parse(sessionStorage.getItem('ids')) ?? [];
                data = data.filter(function( obj ) {
                    return obj.id !== id;
                });
                if ($('.list-package').length > 0) {
                    sessionStorage.setItem("ids", JSON.stringify(data));
                }
            }

            // remove code
            $('#btn-drop-loan').click(function () {
                $('.list-compare').empty();
                for(let i = 0; i < 4; i++)
                {
                    $('.list-compare').append('<li>' +
                        '<div class="bank-compare">' +
                        '<div class="note">Vui lòng <br>chọn khoản vay</div>' +
                        '</div></li>');
                }

                $.each($('.checkbox-compare'), function (index, value) {
                    console.log(value.id);
                    $('#' + value.id).prop( "checked" , false);
                });

                //clear input params
                $('.funcs-btn').find('input[name="ids[]"]').remove()

                $('.compare-group').removeClass('active');

                //remove session
                if ($('.list-package').length > 0) {
                    sessionStorage.removeItem('ids');
                }
            });
        })
    </script>

    @yield('after_scripts')

    <?php
    \App\Helpers\General::get_scripts_include('body');
    ?>
</body>
</html>
