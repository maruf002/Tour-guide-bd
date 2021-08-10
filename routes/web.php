<?php

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



Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/author', 'Auth\LoginController@showAuthorLoginForm')->name('login.author');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/author', 'Auth\RegisterController@showAuthorRegisterForm')->name('register.author');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/author', 'Auth\LoginController@authorLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/author', 'Auth\RegisterController@createAuthor')->name('register.author');

// Route::view('/home', 'home')->middleware('auth');
// Route::group(['middleware' => 'auth'], function () {
//     Route::view('/home', 'home');
// });
Route::group(['as' => 'user.', 'prefix' => 'user',  'middleware' => ['auth', 'user']], function () {
    Route::view('/home', 'home');
    Route::post('add-cart', 'ProductsController@addtoCart')->name('addtoCart');
    Route::get('cart', 'ProductsController@cart')->name('cart');
    Route::get('delete-cart/{id}', 'ProductsController@deleteCart')->name('deleteCart');
    Route::get('updateCart/{id}/{q}', 'ProductsController@updateCart')->name('updateCart');
    Route::Post('apply-coupon', 'ProductsController@applyCoupon')->name('applyCoupon');
    Route::match(['get', 'post'], '/checkout', 'ProductsController@checkout')->name('checkout');
    
 
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:author'], function () {
    Route::view('/author', 'author');
});

