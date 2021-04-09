<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// group nay tu dong chuyen vao
use App\Http\Controllers\LoanPackageController;
use App\Http\Controllers\DepositController;
Route::post('logout', 'LoginController@logout')->name('logout');

Route::group([
    'prefix' => '', //LaravelLocalization::setLocale()
    'middleware' => ['guest'] // 'localeSessionRedirect', 'localizationRedirect',
    ],
    function() {
    Route::get('login/{provider}', 'SocialAuthController@redirectToProvider')->name('login.social');
    Route::get('login/{provider}/callback', 'SocialAuthController@handleProviderCallback')->name('login.social.callback');

//    Route::get('login', 'LoginController@index')->name('login.index');
//    Route::post('login', 'LoginController@index')->name('login');
//    Route::get('register', 'RegisterController@index')->name('register.index');
//    Route::post('register', 'RegisterController@index')->name('register');
//    Route::get('register/otp-validate-phone-number', 'RegisterController@otpValidatePhoneNumber')
//        ->name('register.otp-validate-phone-number');
//    Route::post('register/otp-validate-phone-number', 'RegisterController@otpValidatePhoneNumber');

        Route::get('password/forget', 'PasswordController@forget')->name('password.forget');
        Route::post('password/forget', 'PasswordController@forget');

        Route::post('password/resend-otp', 'PasswordController@resendOtp')->name('password.resend-otp');

        Route::get('password/otp', 'PasswordController@otp')->name('password.otp');
        Route::post('password/otp', 'PasswordController@otp');

        Route::get('password/reset/{token}', 'PasswordController@reset')->name('password.reset');
        Route::post('password/reset/{token}', 'PasswordController@reset');

        Route::get('password/reset-via-phone', 'PasswordController@resetViaPhone')->name('password.reset-via-phone');
        Route::post('password/reset-via-phone', 'PasswordController@resetViaPhone');
});

Route::prefix('customer')->group(function() {
    Route::prefix('gop-y')->group(function() {
        Route::get('', 'FeedbackController@index')->name('customer::feedback.index');
        Route::post('', 'FeedbackController@store')->name('customer::feedback.store');
    });
});

Route::group([], function () {
    Route::prefix('account')->group(function() {
        Route::get('manage', 'CustomerController@index')->name('account::info');
        Route::get('gift', 'CustomerController@gift')->name('account::gift');
        Route::get('my-property', 'CustomerController@myProperty')->name('account::property');
        Route::get('my-category', 'CustomerController@myCategory')->name('account::category');
        Route::get('ihouzz-pay', 'CustomerController@ihouzzPay')->name('account::ihouzz-pay');
    });

    Route::post('account/reset-counter', 'NotificationController@resetCounter')->name('notification.reset-counter');
    Route::get('account/thong-bao', 'NotificationController@index')->name('notification.index');
    Route::get('account/thong-bao/{slug}-{id}.html', 'NotificationController@show')
        ->where(['slug' => '[a-z\-0-9]+', 'id' => '[0-9]+'])
        ->name('notification.show');
    Route::post('account/thong-bao/destroy', 'NotificationController@destroy')->name('notification.destroy');

});
