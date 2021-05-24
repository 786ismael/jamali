<?php
Auth::routes();
Route::group(['middleware' => ['auth']], function () {

	Route::get('/admin/dashboard', 'Admin\HomeController@index')->name('dashboard');
	Route::get('/admin/profile' , 'Admin\ProfileController@show')->name('profile');
	Route::put('/admin/update' , 'Admin\ProfileController@update')->name('admin_profile_update');
	Route::put('/admin/update' , 'Admin\ProfileController@update')->name('admin_profile_update');
	Route::put('/admin/update_password' , 'Admin\ProfileController@updatePassword')->name('admin_update_password');
	Route::put('/admin/update_profile_image' , 'Admin\ProfileController@updateProfileImage')->name('update_profile_image');


	Route::name('admin/user/')->group(function(){
		Route::get('admin/user' , 'Admin\UserController@index')->name('index');
		Route::get('admin/user/create' , 'Admin\UserController@create')->name('create');
		Route::put('admin/user/store' , 'Admin\UserController@store')->name('store');
		Route::get('admin/user/document' , 'Admin\UserController@document')->name('document');
		Route::get('admin/user/invoice/{id?}' , 'Admin\UserController@invoice')->name('invoice');
		Route::get('admin/user/show/{id?}' , 'Admin\UserController@show')->name('show');
		Route::get('admin/user/edit/{id?}' , 'Admin\UserController@edit')->name('edit');
	 	Route::put('admin/user/update/{id?}' , 'Admin\UserController@update')->name('update');
	 	Route::delete('admin/user/delete/{id?}' , 'Admin\UserController@destroy')->name('destroy');
	 	Route::put('admin/user/active_status_change' , 'Admin\UserController@activeStatusChange')->name('active_status_change');
	 	Route::get('admin/user/trip_history' , 'Admin\UserController@tripHistory')->name('trip_history');
	});



	Route::name('admin/vendor/')->group(function(){
		Route::get('admin/vendor' , 'Admin\VendorContoller@index')->name('index');
		Route::get('admin/vendor/create' , 'Admin\VendorContoller@create')->name('create');
		Route::put('admin/vendor/store' , 'Admin\VendorContoller@store')->name('store');
		Route::get('admin/vendor/document' , 'Admin\VendorContoller@document')->name('document');
		Route::get('admin/vendor/show/{id?}' , 'Admin\VendorContoller@show')->name('show');
		Route::get('admin/vendor/edit/{id?}' , 'Admin\VendorContoller@edit')->name('edit');
	 	Route::put('admin/vendor/update/{id?}' , 'Admin\VendorContoller@update')->name('update');
	 	Route::delete('admin/vendor/delete/{id?}' , 'Admin\VendorContoller@destroy')->name('destroy');
	 	Route::put('admin/vendor/active_status_change' , 'Admin\VendorContoller@activeStatusChange')->name('active_status_change');
	 	Route::put('admin/vendor/approve_status_change' , 'Admin\VendorContoller@approveStatusChange')->name('approve_status_change');
	 	
	 	Route::get('admin/vendor/trip_history' , 'Admin\VendorContoller@tripHistory')->name('trip_history');
	 	
	});

	Route::name('admin/category/')->group(function(){
		Route::get('admin/category' , 'Admin\CategoryController@index')->name('index');
		Route::get('admin/category/create' , 'Admin\CategoryController@create')->name('create');
		Route::put('admin/category/store' , 'Admin\CategoryController@store')->name('store');
		Route::get('admin/category/show/{id?}' , 'Admin\CategoryController@show')->name('show');
		Route::get('admin/category/edit/{id?}' , 'Admin\CategoryController@edit')->name('edit');
	 	Route::put('admin/category/update/{id?}' , 'Admin\CategoryController@update')->name('update');
	 	Route::delete('admin/category/delete/{id?}' , 'Admin\CategoryController@destroy')->name('destroy');
	});

	Route::name('admin/order/')->group(function(){
		Route::get('admin/order' , 'Admin\OrderController@index')->name('index');
		Route::get('admin/order/create' , 'Admin\OrderController@create')->name('create');
		Route::put('admin/order/store' , 'Admin\OrderController@store')->name('store');
		Route::get('admin/order/show/{id?}' , 'Admin\OrderController@show')->name('show');
		Route::get('admin/order/edit/{id?}' , 'Admin\OrderController@edit')->name('edit');
	 	Route::put('admin/order/update/{id?}' , 'Admin\OrderController@update')->name('update');
	 	Route::delete('admin/order/destroy/{id}' , 'Admin\OrderController@destroy')->name('destroy');
	});
});
?>