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
Route::resource('User','UserController');

Route::resource('News','NewsController');
Route::resource('Gallery','GalleryController');
Route::resource('Slider','SliderController');



Route::get('/','IndexController@index')->name('shopping');
Auth::routes();
Route::middleware('auth')->prefix('administrator')->group(function (){
    Route::get('/admin', 'HomeController@index')->name('admin');
    Route::resource('setting','SettingController');
    Route::resource('slider','SliderController');
    Route::resource('about','AboutController');
    Route::resource('gallery','GalleryController');

});


