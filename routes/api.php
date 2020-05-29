<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/', function () {
    return 'Buah';
});

Route::prefix('User')->group(function(){
    Route::post('add', 'Api\UserController@add');
    Route::post('update', 'Api\UserController@update');
    Route::post('login', 'Api\UserController@login');
    Route::get('{email}/verify', 'Api\UserController@verify');
});

Route::prefix('Store')->group(function(){
    Route::post('add', 'Api\StoreController@add');
    Route::get('all', 'Api\StoreController@all');
    Route::get('{id}/products', 'Api\StoreController@products');
});

Route::prefix('Product')->group(function(){
    Route::post('add', 'Api\ProductController@add');
});

Route::prefix('CategoryProduct')->group(function(){
    Route::get('{name}/add', 'Api\CategoryProductController@add');
});
