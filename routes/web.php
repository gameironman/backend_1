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

Route::get('/', 'x@index');
Route::get('/news', 'x@news');
Route::get('/news_info/{news_id}', 'x@news_info');
Route::get('/contact_us', 'x@contact_us');
Route::post('/send','x@send');
Route::get('/product','x@product');


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('new','NewsController@index')->name('new_index');
    Route::get('new/create','NewsController@create');
    Route::post('new/store','NewsController@store');
    Route::get('new/edit/{new_id}','NewsController@edit');
    Route::post('new/update/{new_id}','NewsController@update');
    Route::get('new/destroy/{new_id}','NewsController@destroy');

    Route::get('product_db','ProductController@index');
    Route::get('product_db/create','ProductController@create');
    Route::post('product_db/store','ProductController@store');
    Route::get('product_db/edit/{product_id}','ProductController@edit');
    Route::post('product_db/update/{product_id}','ProductController@update');
    Route::get('product_db/destroy/{product_id}','ProductController@destroy');


});

