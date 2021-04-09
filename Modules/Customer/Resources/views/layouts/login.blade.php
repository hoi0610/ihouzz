<?php
use Illuminate\Support\Str;

$ver_js = \App\Helpers\General::get_version_js();
$ver_css = \App\Helpers\General::get_version_css();
$settings = \App\Helpers\General::get_settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><![endif]-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">

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
    <title>@if(isset($title)) {{$title.' :: '.config('app.name')}} @elseif (trim($__env->yieldContent('title'))) @yield('title', 'Trang chủ'){{' :: '.config('app.name')}} @else {{$settings['og_title']['value'].' :: '.config('app.name')}} @endif </title>
    <!-- Styles -->
    <link href="/html/booking/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/html/booking/assets/css/bootstrap-select.css" rel="stylesheet">
    <link href="/html/booking/assets/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="/html/booking/assets/css/pignose.calendar.css" rel="stylesheet">
    <link href="/html/booking/assets/css/wickedpicker.css" rel="stylesheet">
    <link href="/html/booking/assets/css/all.css" rel="stylesheet">
    <link href="/html/booking/assets/css/icon.css" rel="stylesheet">
    <link href="/html/booking/assets/css/slick.css" rel="stylesheet">
    <link href="/html/booking/assets/css/simple.css" rel="stylesheet">
    <link href="/html/booking/assets/css/slick-theme.css" rel="stylesheet">
    <link href="/html/booking/assets/css/style.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="<?=$settings['favicon_ico']['value'] ?? 'favicon.png'?>" type="image/x-icon" sizes="16x16">

    @yield('after_styles')
</head>
<body class="launching-page">
<!--header-->

<!--page-container-->
@yield('content')

<!--script-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/lib/bootstrap-select.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/lib/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/lib/wickedpicker.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/plugin/pignose.calendar.full.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/lib/all.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/lib/bootstrap.min.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/lib/slick.min.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/lib/bigSlide.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/plugin/jquery.sticky-kit.min.js" type="text/javascript"></script>
<script src="/html/booking/assets/js/function.js?v={{$ver_js}}" type="text/javascript"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('after_scripts')

</body>
</html>
