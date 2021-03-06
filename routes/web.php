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

Route::get('/', [
    'as' => 'products.all',
    'uses' => 'HomeController@index'
]);

Route::get('/single/{product}', [
    'as' => 'product.single',
    'uses' => 'HomeController@single'
]);

Route::get('/addToCart/{product}', [
    'as' => 'product.addToCart',
    'uses' => 'HomeController@addToCart'
]);

Route::get('/products/cart', [
    'as' => 'products.cart',
    'uses' => 'HomeController@cart'
]);

Route::post('/remove/{product}', [
    'as' => 'remove.product',
    'uses' => 'HomeController@removeProduct'
]);

Route::post('/update/{product}', [
    'as' => 'update.product',
    'uses' => 'HomeController@updateCart'
]);

Route::get('/products/checkout', [
    'as' => 'checkout',
    'uses' => 'HomeController@checkout'
]);

Route::post('/checkout/store', [
    'as' => 'checkout.store',
    'uses' => 'HomeController@storeCheckout'
]);


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('/dashboard',[
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@index'
    ]);

    Route::post('/export-pdf', [
        'as' => 'category.export.pdf',
        'uses' => 'CategoryController@createPdf'
    ]);

    Route::get('/export-pdf', [
        'as' => 'product.export.pdf',
        'uses' => 'ProductController@createPdf'
    ]);

    Route::get('/update-status/{order_id}/{status_id}', [
        'as' => 'order.status.update',
        'uses' => 'OrderController@updateStatusHandler'
    ]);

    Route::post('/delivery-address-update', [
        'as' => 'delivery.address.update',
        'uses' => 'OrderController@updateDeliveryAddress'
    ]);

    Route::post('/update-customer', [
        'as' => 'customer.update',
        'uses' => 'OrderController@updateCustomer'
    ]);

    Route::post('/order-item-update', [
        'as' => 'order.item.update',
        'uses' => 'OrderItemController@updateOrderItem'
    ]);

    //  Resources Routes
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController');
    Route::resource('order', 'OrderController');
    Route::resource('orderItem', 'OrderItemController');
    Route::resource('orderStatus', 'OrderStatusController');
    Route::resource('label', 'LabelController');
});
