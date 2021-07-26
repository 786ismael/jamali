<?php
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['localization']], function () {
	//============AuthController==========================
	Route::post('/sign_up', 'api\AuthController@signUp');
	Route::post('/update_details_1', 'api\AuthController@update_details1');
	Route::post('/login', 'api\AuthController@login');
	Route::post('/social_login', 'api\AuthController@socialLogin');

	Route::post('/resend_otp', 'api\AuthController@resendOtp');
	Route::post('/otp_verify', 'api\AuthController@otpVerify');
	Route::post('/forgot_password', 'api\AuthController@forgotPassword');
	Route::post('/forgot_password_change', 'api\AuthController@forgotPasswordChange');
	Route::post('/profile_update', 'api\AuthController@profileUpdate');
	Route::post('/notification_update_status', 'api\AuthController@notificationUpdateStatus');
	Route::post('/update_details_1', 'api\AuthController@updateDetails1');
	Route::post('/update_details_2', 'api\AuthController@updateDetails2');
	Route::post('/change_password', 'api\AuthController@changePassword');
	Route::post('/update_address', 'api\AuthController@updateAddress');
	Route::post('/image_upload', 'api\AuthController@ImageUpload');
	Route::post('/profile_image_update', 'api\AuthController@profileImageUpdate');
	Route::post('/add_app_rating', 'api\AuthController@addAppRating');
	Route::post('/send_support_request', 'api\AuthController@sendSupportRequest');

	Route::get('/get_profile', 'api\AuthController@getProfile');
	Route::get('/get_notfication', 'api\AuthController@getNotfication');
	Route::get('/get_vehicle_type', 'api\AuthController@getVehicleType');
	Route::get('/get_lat_lng', 'api\AuthController@getLatLng');
	Route::get('/page', 'api\AuthController@page');
	Route::get('/get_app_rating', 'api\AuthController@getAppRating');
	Route::get('/get_notfication_count', 'api\AuthController@getNotficationCount');
	Route::get('/notfication_read', 'api\AuthController@notficationRead');



	//============UserController==========================
	Route::get('/user/get_home', 'api\UserController@getHome');
	Route::get('/user/get_category', 'api\UserController@getCategory');
	Route::get('/user/get_services', 'api\UserController@getServices');
	Route::get('/user/get_vendor_details', 'api\UserController@getVendorDetails');
	Route::get('/user/get_near_by_service', 'api\UserController@getNearByService');
	Route::get('/user/get_orders', 'api\UserController@getOrders');
	Route::get('/user/get_order_details', 'api\UserController@getOrderDetails');
	Route::get('/user/create_order', 'api\UserController@createOrder');
	Route::get('/user/create_order_cod', 'api\UserController@createOrderCOD');
	Route::post('/user/card_payment', 'api\UserController@cardPayment');
	Route::post('/user/add_rating', 'api\UserController@addRating');
	Route::get('/user/get_service_details', 'api\UserController@getServiceDetails');
	Route::get('/user/order_history', 'api\UserController@orderHistory');
	Route::get('/pay/remainng/amount', 'api\UserController@payRemainingAmount');
	Route::get('/user/get_all_offers', 'api\UserController@getAllVendorOfferList');

	//============VendorController==========================

	Route::get('/vendor/get_days', 'api\VendorController@getDays');
	Route::post('/vendor/add_days', 'api\VendorController@addDays');
	Route::get('/vendor/get_home', 'api\VendorController@getHome');
	Route::get('/vendor/get_appointment_details', 'api\VendorController@getAppointmentDetails');

	Route::get('/vendor/get_category', 'api\VendorController@getCategory');
	Route::post('/vendor/add_service', 'api\VendorController@addService');
	Route::get('/vendor/get_services', 'api\VendorController@getServices');
	Route::get('/vendor/get_service_details', 'api\VendorController@getServiceDetails');
	Route::post('/vendor/update_service', 'api\VendorController@updateService');
	Route::post('/vendor/delete_service', 'api\VendorController@deleteService');
	Route::post('/vendor/add_portfolio', 'api\VendorController@addPortfolio');
	Route::get('/vendor/get_portfolio', 'api\VendorController@getPortfolio');
	Route::get('/vendor/delete_portfolio', 'api\VendorController@deletePortfolio');
	Route::get('/vendor/order_history', 'api\VendorController@orderHistory');
	Route::post('/vendor/order_status_change', 'api\VendorController@orderStatusChange');
	Route::get('/user/success', 'api\UserController@success');

	Route::get('/user/error', 'api\UserController@error');
	//============ChatController==========================
	Route::get('/send_message', 'api\ChatController@sendMessage');
	Route::get('/get_all_chats', 'api\ChatController@getAllChats');
	Route::get('/get_chat', 'api\ChatController@getChat');

	//============PaymentController==========================
	Route::get('/user/paypal_success', 'api\PaymentController@paypalSuccess');
	Route::get('/user/paypal_cancel', 'api\PaymentController@paypalCancel');
	Route::get('/user/status', 'api\PaymentController@getPaymentStatus');
	Route::get('/users/{id}', 'api\UserController@getUser');
	Route::get('/get_all_users', 'api\UserController@getAllUser');


	Route::post('/vendor/add_product', 'api\VendorController@addProduct');
	Route::get('/vendor/get_product', 'api\VendorController@getProduct');
	Route::get('/vendor/get_product_details', 'api\VendorController@getProductDetails');
	Route::post('/vendor/update_product', 'api\VendorController@updateProduct');
	Route::post('/vendor/delete_product', 'api\VendorController@deleteProduct');


	Route::post('/vendor/add_offers','api\VendorController@vendorOfferAdd');
    Route::post('/vendor/update_offers', 'api\VendorController@updateOffers');
	Route::get('/vendor/get_offers','api\VendorController@getVendorOfferList');
	Route::get('/vendor/delete_offer','api\VendorController@deleteVendorOfferList');

});

Route::get('/term-condition', 'api\AuthController@termCondition');
Route::get('/privacy-policy', 'api\AuthController@privacyPolicy');

Route::get('/user/add/favourite', 'api\UserController@addFavourite');
Route::get('/user/remove/favourite', 'api\UserController@removeFavourite');
Route::get('/user/favourite/list', 'api\UserController@favouriteList');
//Route::get('/country_list', 'api\AuthController@countryList');
//Route::get('/city-list', 'api\AuthController@cityList');

Route::get('/country_list', 'api\UserController@countryList');
Route::get('/city-list', 'api\UserController@cityList');




