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

Auth::routes([
    "register" => false
]);

Route::get('/', 'DashboardController@index')->name('dashboard'); 
Route::get('/gallery/product/{id}', 'ProductController@gallery')->name('product.galleries');
Route::resource('/products', 'ProductController');
Route::resource('/galleries', 'ProductGalleryController');