<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RederController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;


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
Route::get('/', function () {
return view('auth/login');
});


Route::get('/redirects',[ConnectionController::class,'redirects'])->name('redirects');

Route::group(['middleware' =>['auth:sanctum', 'verified','auth_admin']], function(){
    Route::get('/admin/dashboard',[DashboardController::class,'index']);

    Route::get('/admin/reader',[RederController::class,'index'])->name('admin.reader');
    Route::post('/save_reader',[RederController::class,'store'])->name('save_reader');
    Route::patch('/update_reader/{id}',[RederController::class,'update'])->name('update_reader');
    Route::delete('/delete_reader/{id}',[RederController::class,'delete'])->name('delete_reader');

    Route::get('/admin/category',[CategoryController::class,'index'])->name('admin.category');
    Route::post('/category_save',[CategoryController::class,'store'])->name('category_save');
    Route::patch('/update_category/{id}',[CategoryController::class,'update'])->name('update_category');
    Route::delete('/delete_category/{id}',[CategoryController::class,'delete'])->name('delete_category');

    Route::get('/admin/banners',[BannerController::class,'index'])->name('admin.banner');
    Route::post('/banner_save',[BannerController::class,'store'])->name('banner_save');
    Route::patch('/update_banner/{id}',[BannerController::class,'update'])->name('update_banner');
    Route::delete('/delete_banner/{id}',[BannerController::class,'delete'])->name('delete_banner');

    Route::get('/admin/about',[AboutController::class,'index'])->name('admin.about');
    Route::post('/about_save',[AboutController::class,'store'])->name('about_save');
    Route::patch('/update_about/{id}',[AboutController::class,'update'])->name('update_about');
    Route::delete('/delete_about/{id}',[AboutController::class,'delete'])->name('delete_about');
});

Route::group(['middleware' =>['auth:sanctum', 'verified']], function(){
    Route::get('/index',[HomeController::class,'index']);
    Route::get('/auth_user/dashboard',[UserDashboardController::class,'index']);

//start user  route
Route::get('/shop', [HomeController::class,'shop'])->name('shop');

Route::get('/shop-single/{id}',[HomeController::class,'shop_single'])->name('shop-single');

Route::get('/buy/{reader_id}',[HomeController::class,'buy'])->name('buy');

Route::post('/add_to_cart',[HomeController::class,'add_to_cart'])->name('add_to_cart');

Route::get('/about', [HomeController::class,'about'])->name('about');

Route::get('/download/{readername}', [HomeController::class,'download'])->name('download');

Route::get('/cart_list',[HomeController::class,'cart_list'])->name('cart_list');

Route::patch('/update_item/{cart_id}',[HomeController::class,'update_item'])->name('update_item');

Route::get('/remove_item/{cart_id}',[HomeController::class,'remove_item'])->name('remove_item');

Route::get('/order_now',[HomeController::class,'order_now'])->name('order_now');

Route::post('/order_place',[HomeController::class,'order_place'])->name('order_place');

Route::get('/orders_show/{user_id}',[HomeController::class,'orders_show'])->name('orders_show');

Route::post('/search_reader',[HomeController::class,'search'])->name('search_reader');

Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');

Route::get('/payment/{method}',[HomeController::class,'payment'])->name('payment');

Route::post('/payment',[PaymentController::class,'payment'])->name('payment');
Route::get('/orange/{method}',[PaymentController::class,'orange'])->name('orange');
Route::get('/mtn/{method}',[PaymentController::class,'mtn'])->name('mtn');

Route::get('handle-payment', 'PayPalPaymentController@handlePayment')->name('make.payment');

Route::get('cancel-payment', 'PayPalPaymentController@paymentCancel')->name('cancel.payment');

Route::get('payment-success', 'PayPalPaymentController@paymentSuccess')->name('success.payment');

Route::post('/send-email',[MailController::class,'sendEmail'])->name('send-email');

});
require __DIR__.'/auth.php';
