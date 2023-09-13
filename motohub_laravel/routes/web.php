<?php

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


Auth::routes();

Route::get('/lang/{locale}', 'App\Http\Controllers\LangController@changeLocale')->name('lang.change');

Route::get('/', 'App\Http\Controllers\User\HomeController@index')->name('user.index');
Route::get('/home', 'App\Http\Controllers\User\HomeController@home')->name('user.home');

Route::prefix('/admin')->group(function(){
    //ADMIN PATHS
    Route::get('/home', 'App\Http\Controllers\Admin\HomeController@home')->name('admin.home');

    Route::prefix('/motorcycles')->group(function(){
        Route::get('/', 'App\Http\Controllers\Admin\MotorcycleController@index')->name('admin.motorcycle.index');
        Route::get('/create', 'App\Http\Controllers\Admin\MotorcycleController@create')->name('admin.motorcycle.create');
        Route::post('/save', 'App\Http\Controllers\Admin\MotorcycleController@save')->name('admin.motorcycle.save');
        Route::get('/{id}', 'App\Http\Controllers\Admin\MotorcycleController@show')->name('admin.motorcycle.show');
        Route::get('/delete/{id}', 'App\Http\Controllers\Admin\MotorcycleController@delete')->name('admin.motorcycle.delete');
    });

    Route::prefix('/brands')->group(function(){
        Route::get('/', 'App\Http\Controllers\Admin\BrandController@index')->name('admin.brand.index');
        Route::get('/create', 'App\Http\Controllers\Admin\BrandController@create')->name('admin.brand.create');
        Route::post('/save', 'App\Http\Controllers\Admin\BrandController@save')->name('admin.brand.save');
        Route::get('/{id}', 'App\Http\Controllers\Admin\BrandController@show')->name('admin.brand.show');
        Route::get('/delete/{id}', 'App\Http\Controllers\Admin\BrandController@delete')->name('admin.brand.delete');
    });
});

Route::prefix('/orders')->group(function () {
    Route::get('/', 'App\Http\Controllers\User\OrderController@index')->name('order.index');
    Route::post('/', 'App\Http\Controllers\User\OrderController@save')->name('order.save');
    Route::post('/add', 'App\Http\Controllers\User\OrderController@add')->name('order.add');
    Route::delete('/', 'App\Http\Controllers\User\OrderController@deleteAll')->name('order.deleteAll');
    Route::delete('/{id}', 'App\Http\Controllers\User\OrderController@delete')->name('order.delete');
});

Route::prefix('/brands')->group(function(){
    Route::get('/', 'App\Http\Controllers\User\BrandController@index')->name('user.brand.index');
    Route::get('/{id}', 'App\Http\Controllers\User\BrandController@show')->name('user.brand.show');
});

Route::prefix('/motorcycles')->group(function(){
    Route::get('/', 'App\Http\Controllers\User\MotorcycleController@index')->name('user.motorcycle.index');
    Route::get('/{id}', 'App\Http\Controllers\User\MotorcycleController@show')->name('user.motorcycle.show');
});
