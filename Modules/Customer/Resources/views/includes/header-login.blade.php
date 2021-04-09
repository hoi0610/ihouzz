@include('customer::includes.switch-locale')
<?php
$locale = LaravelLocalization::getCurrentLocale();
?>
<a href="/" class="logo"><img src="/html/e-customer/assets/images/logo-{!! $locale !!}.png" alt=""></a>
