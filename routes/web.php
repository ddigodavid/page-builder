<?php

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

Route::get('/', function () {
    return view('app');
});

Route::post('/upload', 'Photos\\PhotosController@save')->name('upload');
Route::post('/delete', 'Photos\\PhotosController@delete')->name('delete');
Route::post('/listPhotos', 'Photos\\PhotosController@listPhotos')->name('list');