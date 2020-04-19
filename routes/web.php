<?php

use Illuminate\Support\Facades\Route;


Route::get('/','IndexController@index')->name('shopping');
Auth::routes();
Route::middleware('auth')->prefix('administrator')->group(function (){
    Route::get('/admin', 'HomeController@index')->name('admin');
    Route::resource('setting','SettingController');
    Route::resource('slider','SliderController');
    Route::resource('about','AboutController');
    Route::resource('gallery','GalleryController');
    Route::resource('contact','ContactController');
    Route::resource('news','NewsController');

});
Route::post('/insertContact','ContactController@store')->name('contact.data');
Route::get('/showNews','NewsController@indexSite')->name('news.show');
