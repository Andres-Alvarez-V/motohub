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

Route::get('/', 'App\Http\Controllers\User\HomeController@index')->name('user.index');
Route::get('/home', 'App\Http\Controllers\User\HomeController@home')->name('user.home');
Route::get('/home/admin', 'App\Http\Controllers\Admin\HomeController@home')->name('admin.home');
Route::get('/brands', 'App\Http\Controllers\BrandController@index')->name('brand.index');
Route::get('/brands/create', 'App\Http\Controllers\BrandController@create')->name('brand.create');
Route::post('/brands/save', 'App\Http\Controllers\BrandController@save')->name('brand.save');
Route::get('/brands/{id}', 'App\Http\Controllers\BrandController@show')->name('brand.show');
Route::get('/brands/delete/{id}', 'App\Http\Controllers\BrandController@delete')->name('brand.delete');
Route::get('/motorcycles', 'App\Http\Controllers\MotorcycleController@index')->name('motorcycle.index');
Route::get('/motorcycles/create', 'App\Http\Controllers\MotorcycleController@create')->name('motorcycle.create');
Route::post('/motorcycles/save', 'App\Http\Controllers\MotorcycleController@save')->name('motorcycle.save');
Route::get('/motorcycles/{id}', 'App\Http\Controllers\MotorcycleController@show')->name('motorcycle.show');
Route::get('/motorcycles/delete/{id}', 'App\Http\Controllers\MotorcycleController@delete')->name('motorcycle.delete');

Route::prefix('/orders')->group(function () {
    Route::get('/', 'App\Http\Controllers\OrderController@index')->name('order.index');
    Route::post('/', 'App\Http\Controllers\OrderController@save')->name('order.save');
    Route::post('/add', 'App\Http\Controllers\OrderController@add')->name('order.add');
    Route::delete('/', 'App\Http\Controllers\OrderController@deleteAll')->name('order.deleteAll');
    Route::delete('/{id}', 'App\Http\Controllers\OrderController@delete')->name('order.delete');
});
