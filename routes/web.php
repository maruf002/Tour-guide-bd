<?php

use App\Http\Controllers\IndexController;
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
Route::post('place-modal-details', 'IndexController@modal_details')->name('place-modal-details');
// Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'indexController@myformAjax'));
Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'indexController@myformAjax'));
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('place/{slug}','IndexController@detailes')->name('place.detailes');

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


Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin','middleware'=>['auth:admin']],function(){
	
	Route::get('dashboard','DashboardController@index')->name('dashboard');
	Route::delete('/delete/user/{id}/','DashboardController@destroy')->name('user.delete');
	Route::resource('post','PostController');
	Route::get('/pending/post','PostController@pending')->name('post.pending');
	Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');


});


Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'Author','middleware'=>['auth']],function(){
	
	Route::get('dashboard','DashboardController@index')->name('dashboard');
	Route::resource('post','PostController');
	
	

});


