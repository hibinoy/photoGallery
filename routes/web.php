<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PhotoGalleryController@index');
Route::post('/', 'PhotoGalleryController@store');
Route::delete('/{id}', 'PhotoGalleryController@delete');
Route::post('/setting', 'PhotoGalleryController@setting');