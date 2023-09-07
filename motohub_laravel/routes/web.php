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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/brands', 'App\Http\Controllers\BrandController@index')->name("brand.index");
Route::get('/brands/create', 'App\Http\Controllers\BrandController@create')->name("brand.create");
Route::post('/brands/save', 'App\Http\Controllers\BrandController@save')->name("brand.save");
Route::get('/brands/{id}', 'App\Http\Controllers\BrandController@show')->name("brand.show");
Route::get('/brands/delete/{id}', 'App\Http\Controllers\BrandController@delete')->name('brand.delete');
