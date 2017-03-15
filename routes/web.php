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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/home', 'Controller@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/photos/list', 'Photos\\PhotosController@listPhotos')->name('list');
    Route::post('/photos/upload', 'Photos\\PhotosController@save')->name('upload');
    Route::post('/photos/delete', 'Photos\\PhotosController@delete')->name('delete');

    Route::get('/pages/list', 'Pages\\PagesController@index')->name('pages.list');
    Route::get('/pages/new', 'Pages\\PagesController@beforeCreate')->name('pages.new');
    Route::get('/pages/new/{templateId}', 'Pages\\PagesController@newPage')->name('pages.new.post');
    Route::get('/pages/edit/{pageId}', 'Pages\\PagesController@edit')->name('pages.edit');
    Route::post('/pages/save', 'Pages\\PagesController@save')->name('pages.save');
    Route::delete('/pages/delete/{pageId}', 'Pages\\PagesController@destroy')->name('pages.delete');

    Route::post('/templates/list', 'Templates\\TemplatesController@listTemplates')->name('templates.list');
    Route::post('/collections/list', 'TemplateCollections\\TemplateCollectionsController@listTemplateCollections')->name('template-collections.list.post');

    Route::group(['middleware' => 'can:manage,App\User'], function () {
        Route::get('/templates/list', 'Templates\\TemplatesController@index')->name('templates.list');
        Route::get('/templates/new', 'Templates\\TemplatesController@create')->name('templates.new');
        Route::get('/templates/edit/{templateId}', 'Templates\\TemplatesController@edit')->name('templates.edit');
        Route::post('/templates/save', 'Templates\\TemplatesController@save')->name('templates.save');
        Route::delete('/templates/delete/{templateId}', 'Templates\\TemplatesController@destroy')->name('templates.delete');

        Route::get('/collections/list', 'TemplateCollections\\TemplateCollectionsController@index')->name('template-collections.list');
        Route::get('/collections/new', 'TemplateCollections\\TemplateCollectionsController@create')->name('template-collections.new');
        Route::get('/collections/edit/{collectionId}', 'TemplateCollections\\TemplateCollectionsController@edit')->name('template-collections.edit');
        Route::post('/collections/save', 'TemplateCollections\\TemplateCollectionsController@save')->name('template-collections.save');
        Route::delete('/collections/delete/{collectionId}', 'TemplateCollections\\TemplateCollectionsController@destroy')->name('template-collections.delete');

        Route::get('/users/list', 'Users\UsersController@index')->name('user.list');
        Route::get('/users/edit/{userId}', 'Users\UsersController@edit')->name('user.edit');
        Route::delete('/users/delete/{userId}', 'Users\UsersController@destroy')->name('user.delete');
        Route::post('/users/save', 'Users\UsersController@save')->name('user.save');

        Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('user.new');
        Route::post('/register', 'Auth\RegisterController@register');
    });
});

Route::post('/login', 'Auth\LoginController@login');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

Route::get('/logout', 'Auth\LoginController@logout');
