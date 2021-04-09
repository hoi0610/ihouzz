<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterAdvisoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\LoanPackageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ValuationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\LandingPagesController;

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

Route::get('/', [HomeController::class, 'index' ])->name('home.index');
Route::get('gioi-thieu', [LandingPagesController::class, 'aboutUs' ])->name('about-us');

// auth
Route::get('/register', [RegisterController::class, 'index' ])->name('register.index');
Route::post('/register/customer', [RegisterController::class, 'registerCustomer' ])->name('register.customer');
Route::post('/register/agent', [RegisterController::class, 'registerAgent' ])->name('register.agent');
Route::get('/authenticate', [RegisterController::class, 'authenticateIndex' ])->name('authenticate.index');
Route::get('/login', [LoginController::class, 'login' ])->name('login');
Route::post('/login', [LoginController::class, 'loginSave' ])->name('login');
Route::post('/login/agent', [LoginController::class, 'loginAgent' ])->name('login.agent');
Route::get('auth/redirect/{provider}', [SocialLoginController::class, 'redirect'])->name('social.redirect');
Route::get('callback/{provider}', [SocialLoginController::class, 'callback'])->name('social.callback');
Route::post('favorite', [UserController::class, 'saveFavoriteProduct'])->name('favorite');
Route::post('destroy/favorite', [UserController::class, 'destroyFavoriteProduct'])->name('destroy-favorite');

Route::get('/dai-ly', [AgentsController::class, 'index' ])->name('agents.index');
Route::get('dai-ly/{id}', [AgentsController::class, 'show' ])
    ->where(['id' => '[0-9]+'])
    ->name('agents.show');
Route::get('/chuyen-vien-moi-gioi/{id}', [AgencyController::class, 'index' ])->name('chuyen-vien-moi-gioi');

Route::group(['prefix' => 'location'], function () {
    Route::get('/', [LocationController::class, 'index' ])->name('location.index');
    Route::get('get-provinces', [LocationController::class, 'get_provinces' ]);
    Route::get('get-districts', [LocationController::class, 'get_districts' ]);
    Route::get('list-districts', [LocationController::class, 'getAllDistricts' ])->name('location.districts');
    Route::get('get-wards', [LocationController::class, 'get_wards' ]);
});

Route::get('doi-mk', [UserController::class, 'index' ])->name('doi-mk');
Route::patch('account/change-pass', [UserController::class, 'changePass' ])->name('account.change-pass');

Route::get('du-an', [ProjectController::class, 'list' ])->name('du-an');
Route::get('du-an/{id}', [ProjectController::class, 'detail'])->where(['id' => '[0-9]+'])->name('du-an.detail');

Route::get('faq', [FaqController::class, 'index' ])->name('faq');
Route::get('faq/{id}', [FaqController::class, 'detail' ])->where(['id' => '[0-9]+'])->name('faq-detail');

Route::get('quy-hoach', [PlanningController::class, 'index' ])->name('quy-hoach');

Route::group(['prefix' => 'cache'], function () {
    Route::get('/update-js', [CacheController::class, 'update_js' ])->name('cache.update-js');
    Route::get('/update-css', [CacheController::class, 'update_css' ])->name('cache.update-css');
    Route::get('/update-all', [CacheController::class, 'update_all' ])->name('cache.update-all');
});

// xem gia
Route::group(['prefix' => 'valuation', 'as' => 'valuation.'], function () {
    Route::get('/', [ValuationController::class, 'all' ])->name('all');
    Route::get('district/{dis_id}/street/{str_id}', [ValuationController::class, 'street' ])->name('street');
    Route::get('/district/{id}', [ValuationController::class, 'district' ])->name('district');
});

// tin tuc
Route::group(['prefix' => 'tin-tuc', 'as' => 'tin-tuc.'], function () {
    Route::get('/', [NewsController::class, 'index' ])->name('index');
    Route::get('/{id}', [NewsController::class, 'detail' ])->where(['id' => '[0-9]+'])->name('detail');
});

//phong thuy
Route::get('phong-thuy', [NewsController::class, 'fengShui' ])->name('phong-thuy');
Route::get('phong-thuy/{id}', [NewsController::class, 'fengShuiDetail' ])->where(['id' => '[0-9]+'])->name('phong-thuy-detail');

// cam nang
Route::get('cam-nang', [NewsController::class, 'handbook'])->name('cam-nang');
Route::get('cam-nang/{id}', [NewsController::class, 'handbookDetail'])
    ->where(['id' => '[0-9]+'])
    ->name('cam-nang-detail');

// tài chính
Route::group(['prefix' => 'tai-chinh', 'as' => 'finance.'], function () {
    Route::get('/', [NewsController::class, 'finance' ])->name('index');
    Route::get('/{id}', [NewsController::class, 'financeDetail' ])->where(['id' => '[0-9]+'])->name('detail');
});

Route::group([
    'prefix' => 'noi-ngoai-that',
    'as'=>'exterior.'  ],function(){
    Route::get('/',[NewsController::class,'exterior'])->name('index');
    Route::get('/chitiet/{id}',[NewsController::class,'exteriorDetail'])->name('detail');
});

Route::group([
    'prefix' => 'goi-vay',
    'as' => 'goi-vay.'
],function (){
    Route::get('/',[LoanPackageController::class,'index'])->name('index');
    Route::get('/{id}',[LoanPackageController::class,'detail'])->name('chitiet');
    Route::post('/so-sanh',[LoanPackageController::class,'compare'])->name('compare');
    Route::post('/apply-loan-package', [LoanPackageController::class, 'applyLoanPackage'])->name('applyLoanPackage');
});

Route::get('dieu-khoan-su-dung.html',[LoanPackageController::class,'support'])->name('support');

Route::group([
    'prefix' => 'ky-gui',
    'as'=>'ky-gui.'
    ] ,function(){
    Route::get('/',[DepositController::class,'index']);
    Route::post('/',[DepositController::class,'saveConsignment']);
});

Route::get('lien-he', [ContactController::class,'index'])->name('lien-he');

// category
Route::group([
    'prefix' => 'category',
    'as' => 'category.'
], function() {
    Route::get('/cate-nha-ban', [CategoryController::class, 'nhaBanLayout'])->name('nha-ban');
    Route::get('/cate-nha-thue', [CategoryController::class, 'nhaThueLayout'])->name('nha-thue');
    Route::get('/chi-tiet/{id}', [CategoryController::class, 'show'])->name('show');
});

// dang ky tu van va xem nha
Route::group([
    'prefix' => 'register',
    'as' => 'register.'
], function () {
    Route::post('/F', [RegisterAdvisoryController::class, 'registerAdvisory'])->name('advisory');
    Route::post('/homeview', [RegisterAdvisoryController::class, 'registerHomeView'])->name('home-view');
});
