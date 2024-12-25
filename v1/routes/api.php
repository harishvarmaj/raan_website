<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('referal', 'Billinfiniti\API\V1\ReferalController')->middleware('auth:api');

Route::post('verifyMobile', 'Billinfiniti\API\V1\OtpController@verifyMobile');

Route::resource('otp', 'Billinfiniti\API\V1\OtpController');

Route::resource('updateDeviceId', 'Billinfiniti\API\V1\DeviceTokenUpdateController');

Route::resource('fcm', 'Billinfiniti\API\V1\PushNotificationController');

Route::resource('dashboard', 'Billinfiniti\API\V1\DashboardController');

Route::resource('wholesale', 'Billinfiniti\API\V1\WholesaleController');

Route::post('login', 'Billinfiniti\API\V1\AuthController@login')->name('login');

Route::delete('logout', 'Billinfiniti\API\V1\AuthController@logout')->name('logout');

Route::delete('deviceToken', 'Billinfiniti\API\V1\AuthController@deviceToken')->name('deviceToken');

Route::post('changePassword', 'Billinfiniti\API\V1\AuthController@changePassword')->name('changePassword');

Route::post('forgotPassword', 'Billinfiniti\API\V1\AuthController@forgotPassword')->name('forgotPassword');

Route::post('resetPassword/{token}', 'Billinfiniti\API\V1\AuthController@resetPassword')->name('resetPassword');

Route::resource('category', 'Billinfiniti\API\V1\CategoryController');

Route::resource('pincode', 'Billinfiniti\API\V1\PincodeController');

Route::resource('link_banner', 'Billinfiniti\API\V1\BannerLinkController');

Route::resource('delivery-boy', 'Billinfiniti\API\V1\DeliveryBoyController');

Route::resource('product-variant', 'Billinfiniti\API\V1\ProductVariantsController');

Route::post('product/customer', 'Billinfiniti\API\V1\ProductController@customer');

Route::resource('product', 'Billinfiniti\API\V1\ProductController');

Route::resource('profile', 'Billinfiniti\API\V1\ProfileController');

Route::resource('signup', 'Billinfiniti\API\V1\SignupController');

Route::resource('cms', 'Billinfiniti\API\V1\CmsController');

Route::resource('contact', 'Billinfiniti\API\V1\ContactController');

Route::post('cart/deleteAll', 'Billinfiniti\API\V1\CartController@deleteAll')->middleware('auth:api');

Route::resource('cart', 'Billinfiniti\API\V1\CartController')->middleware('auth:api');

Route::resource('guest_cart', 'Billinfiniti\API\V1\GuestCartController');

Route::resource('wishlist', 'Billinfiniti\API\V1\WishlistController')->middleware('auth:api');

Route::resource('specials', 'Billinfiniti\API\V1\SpecialProductsController')->middleware('auth:api');

Route::get('special-product/{type}', 'Billinfiniti\API\V1\SpecialProductsController@index')->name('special-product');
Route::resource('search', 'Billinfiniti\API\V1\SearchController');

Route::resource('offers', 'Billinfiniti\API\V1\OffersController')->middleware('auth:api');

Route::resource('user-address', 'Billinfiniti\API\V1\UserAddressController')->middleware('auth:api');

Route::resource('orders', 'Billinfiniti\API\V1\OrdersController')->middleware('auth:api');

Route::resource('deliveryboy-orders', 'Billinfiniti\API\V1\DeliveryBoyOrdersController')->middleware('auth:api');

Route::resource('admin-orders', 'Billinfiniti\API\V1\AdminOrdersController')->middleware('auth:api');


