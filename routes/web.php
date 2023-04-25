<?php

use App\Http\Controllers\CategoryController;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index' ) -> name('home.index');
Route::get('/home', 'App\Http\Controllers\HomeController@index' ) -> name('home.index');
Route::get('/product', 'App\Http\Controllers\HomeController@product' ) -> name('home.product');
Route::get('/about', 'App\Http\Controllers\HomeController@about' ) -> name('home.about');
Route::get('/news', 'App\Http\Controllers\HomeController@news' ) -> name('home.news');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact' ) -> name('home.contact');
Route::get('/product_detail', 'App\Http\Controllers\HomeController@product_detail' ) -> name('home.product_detail');


/**
 * GET => customer.index => danh sách
 * GET => customer.create => form thêm mới
 * POST => customer.store => khi submit form thêm mới
 * GET => customer.show => xem chi tiết
 * GET => customer.edit => hiển thị form edit
 * PUT => customer.update => khi submit form edit
 * DELETE => customer.destroy => khi xóa
 */
// Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\API'], function(){
//     Route::get('/', 'App\Http\Controllers\API\AuthController@view_login') -> name('login');
//     Route::get('/register', 'App\Http\Controllers\API\AuthController@view_register') -> name('register');
// });

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin' ,'middleware' => 'auth'], function(){
    Route::get('/', 'App\Http\Controllers\Admin\AdminController@dashboard') -> name('admin.dashboard');
    Route::get('/logout', 'App\Http\Controllers\Admin\AdminController@logout') -> name('logout');

    Route::resources([
        'user' => 'App\Http\Controllers\Admin\UserController',
        'category' => 'App\Http\Controllers\Admin\CategoryController',
        'product' => 'App\Http\Controllers\Admin\ProductController',
        'blog' => 'App\Http\Controllers\Admin\BlogController',
        'order' => 'App\Http\Controllers\Admin\OrderController'
    ]);
});

Route::get('admin/login', 'App\Http\Controllers\Admin\AdminController@login') -> name('login');
Route::post('admin/login', 'App\Http\Controllers\Admin\AdminController@post_login') -> name('login');
Route::post('/{id}', 'App\Http\Controllers\HomeController@view') -> name('view');

Route::get('auth/login', 'App\Http\Controllers\API\AuthController@view_login') -> name('auth.login');
Route::get('auth/register', 'App\Http\Controllers\API\AuthController@view_register') -> name('auth.register');

Route::get('customer/login', 'App\Http\Controllers\CustomerController@view_login') -> name('customer.login');
Route::get('customer/register', 'App\Http\Controllers\CustomerController@view_register') -> name('customer.register');
Route::post('customer/login', 'App\Http\Controllers\CustomerController@login') -> name('customer.login');
Route::post('customer/register', 'App\Http\Controllers\CustomerController@register') -> name('customer.register');




