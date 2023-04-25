<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('category', 'App\Http\Controllers\ApiController@category') -> name('api.category');
Route::post('category', 'App\Http\Controllers\ApiController@addCate') -> name('api.addCate');
Route::put('category/{id}', 'App\Http\Controllers\ApiController@updateCate') -> name('api.updateCate');
Route::delete('category/{id}', 'App\Http\Controllers\ApiController@delete') -> name('api.delete');
Route::get('product', 'App\Http\Controllers\ApiController@product') -> name('api.product');
// Route::get('product/{id}', 'App\Http\Controllers\ApiController@product') -> name('api.product');


Route::post('category', 'App\Http\Controllers\ApiController@addCate') -> name('api.addCate');
Route::get('customer', 'App\Http\Controllers\API\AuthController@customer') -> name('auth.customer');
//API route để đăng ký
Route::post('/register', 'App\Http\Controllers\API\AuthController@register') -> name('auth.register');
//API route để đăng nhập
Route::post('/login', 'App\Http\Controllers\API\AuthController@login') -> name('auth.login');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) { 
        return auth()->user();
    });
    // API route thoát
    Route::post('/logout','App\Http\Controllers\API\AuthController@logout') -> name('auth.logout');
});