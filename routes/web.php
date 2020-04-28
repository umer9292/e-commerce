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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('/dashboard',[
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@index'
    ]);

    Route::get('/export-pdf', [
        'as' => 'category.export.pdf',
        'uses' => 'CategoryController@createPdf'
    ]);

    Route::get('/export-pdf', [
        'as' => 'product.export.pdf',
        'uses' => 'ProductController@createPdf'
    ]);

    //  Resources Routes
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController');
});
