<?php

use Illuminate\Support\Facades\Route;


Route::get('/','IndexController@index')->name('shopping');
Route::get('/news/{id}','IndexController@news')->name('news');
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

