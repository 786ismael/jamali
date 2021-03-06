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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('admin-login');
Route::get('/admin', 'Auth\LoginController@showLoginForm')->name('admin-login');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/demo', 'Admin\UserController@index')->name('index');

Route::get('users', 'Admin\UserController@index');
Route::get('users-list', 'Admin\UserController@usersList');
Route::get('term_condition', 'Admin\HomeController@termCondition')->name('term_condition');

Route::get('payment', 'PaymentController@paymentForm')->name('payment.form');
Route::post('payment', 'PaymentController@payment');
Route::get('payment/callback', 'PaymentController@paymentCallBack')->name('payment.callback');

Route::get('api/user/success', function(){
     return view('paypal.success');
})->name('payment.success');

Route::get('api/user/cancel', function(){
    return view('paypal.cancel');
})->name('payment.failed');

Route::get('api/user/error', function(){
    return view('paypal.cancel');
})->name('payment.error');

/**
 *  Landing Page
 */
//Route::get('/', 'HomeController@index')->name('index');
Route::get('/term-condition', 'HomeController@termCondition')->name('term.condition');
Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('privacy.policy');
Route::get('/support', 'HomeController@support')->name('support');


/**
 * Landing page Route's
 */
Route::get('admin/landing/page', 'Admin\LandingPageController@index')->name('landing.index');

Route::get('admin/landing/page/home/top/slider', 'Admin\LandingPageController@homeTopSlider')->name('landing.homeTopSlider');
Route::get('admin/landing/page/special/feature', 'Admin\LandingPageController@specialFeature')->name('landing.specialFeature');
Route::get('admin/landing/page/our/vision', 'Admin\LandingPageController@ourVision')->name('landing.ourVision');
Route::get('admin/landing/page/portfolio', 'Admin\LandingPageController@portfolio')->name('landing.portfolio');




Route::get('admin/landing/page/online/marketing', 'Admin\LandingPageController@onlineMarketing')->name('landing.onlineMarketing');
Route::get('admin/landing/page/develop', 'Admin\LandingPageController@develop')->name('landing.develop');
Route::get('admin/landing/page/trading', 'Admin\LandingPageController@trading')->name('landing.trading');
Route::get('admin/landing/page/online/services', 'Admin\LandingPageController@onlineServices')->name('landing.onlineServices');

Route::get('admin/landing/page/add', 'Admin\LandingPageController@create')->name('landing.create');
Route::put('admin/landing/page/update', 'Admin\LandingPageController@update')->name('landing.update');

Route::get('admin/landing/page/delete', 'Admin\LandingPageController@delete')->name('landing.delete');

Route::get('admin/region', 'Admin\HomeController@region')->name('admin.region');
Route::get('admin/city/{id}', 'Admin\HomeController@city')->name('admin.city');
Route::get('admin/region/create', 'Admin\HomeController@createReagion')->name('admin.region.create');
Route::post('admin/reagion/store', 'Admin\HomeController@storeReagion')->name('admin.reagion.store');
Route::get('admin/region/edit/{id}', 'Admin\HomeController@editReagion')->name('admin.reagion.edit');
Route::post('admin/reagion/update', 'Admin\HomeController@updateReagion')->name('admin.reagion.update');
Route::post('admin/reagion/delete', 'Admin\HomeController@deleteReagion');
Route::get('admin/reagion/active_status_change', 'Admin\HomeController@activeStatusChange');

Route::get('admin/create/city', 'Admin\HomeController@createCity')->name('admin.city.create');
Route::post('admin/city/store', 'Admin\HomeController@storeCity')->name('admin.city.store');
Route::get('admin/active_city_status_change', 'Admin\HomeController@activeCityStatusChange');
Route::get('admin/city/edit/{id}', 'Admin\HomeController@editCity')->name('admin.reagion.edit');
Route::post('admin/city/update', 'Admin\HomeController@updateCity')->name('admin.city.update');
Route::post('admin/city/delete', 'Admin\HomeController@deleteCity')->name('admin.city.delete');
