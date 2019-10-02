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

Route::get('/', 'GuestbookController@list')->name('home');
Route::redirect('/home', '/');

Route::post('/store_entry', 'GuestbookController@storeArticle')->name('store');
Route::get('/create_entry', 'GuestbookController@createArticle')->name('create');
