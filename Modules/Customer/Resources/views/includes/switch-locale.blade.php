<?php
$locale = LaravelLocalization::getCurrentLocale();
?>
<div class="toggleWrapper">
    <input type="checkbox" class="dn" id="switch_locale" {!! $locale=='en' ? 'checked="true"' : '' !!}
    data-false="{{ LaravelLocalization::getLocalizedURL('vi', null, [], true) }}"
           data-true="{{ LaravelLocalization::getLocalizedURL('en') }}"/>
    <label for="switch_locale" class="toggle">
        <span class="toggle__handler">  </span>
    </label>
</div>
