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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::get('/forget-password', 'ForgotPasswordController@getEmail');
Route::post('/forget-password', 'ForgotPasswordController@postEmail');

Route::Resource('brand', 'BrandController');
Route::get('/search','BrandController@search');

Route::Resource('category', 'CategoryController');

Route::Resource('user', 'UserController');

Route::Resource('product', 'ProductController');

/* Route::get('/index','BrandController@index')->name('index');
Route::get('/brand/add','BrandController@create');

Route::post('/addimage','BrandController@store')->name('addimage');
 */

/* https://laravel0.themes-coder.net/admin/admins
 */


