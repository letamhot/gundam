<?php

use App\Http\Controllers\Admin\ImportController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('/admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['auth', 'is_admin'])->group(function(){
        //category
        Route::get('/category/dataCategory', 'CategoryController@dataCategory')->name('category.dataCategory');
        Route::get('/category/dataTrash', 'CategoryController@datatrashCategory')->name('category.datatrashCategory');
        Route::get('/category/trash', 'CategoryController@trash')->name('category.trash');
        Route::get('/category/restore/{category}', 'CategoryController@restore')->name('category.restore');
        Route::delete('/category/deleteTrash/{category}', 'CategoryController@deleteTrash')->name('category.deleteTrash');
        Route::resource('/category', 'CategoryController');

        //user
        Route::get('/user/userData', 'UserController@userData')->name('user.userData');
        Route::get('/user/dataTrash', 'UserController@userTrashData')->name('user.dataTrash');
        Route::get('/user/trash', 'UserController@trash')->name('user.trash');
        Route::get('/user/restore/{user}', 'UserController@restore')->name('user.restore');
        Route::delete('/user/delete/{user}', 'UserController@delete')->name('user.delete');
        Route::resource('/user', 'UserController');

        //product
        Route::get('/product/productData', 'ProductController@productData')->name('product.productData');
        Route::get('/product/productTrashData', 'ProductController@productTrashData')->name('product.productTrashData');
        Route::get('/product/trash', 'ProductController@trash')->name('product.trash');
        Route::get('/product/restore/{product}', 'ProductController@restore')->name('product.restore');
        Route::delete('/product/deleteTrash/{product}', 'ProductController@deleteTrash')->name('product.deleteTrash');
        Route::get('/product/qty/{id}', 'ProductController@qtyGet')->name('product.qtyGet');
        Route::post('/product/qty/{id}', 'ProductController@qtyPost')->name('product.qtyPost');

        Route::resource('/product', 'ProductController');

        //producer
        Route::get('/producer/producerData', 'ProducerController@producerData')->name('producer.producerData');
        Route::get('/producer/producerTrashData', 'ProducerController@producerTrashData')->name('producer.producerTrashData');
        Route::get('/producer/trash', 'ProducerController@trash')->name('producer.trash');
        Route::get('/producer/restore/{producer}', 'ProducerController@restore')->name('producer.restore');
        Route::delete('/producer/deleteTrash/{producer}', 'ProducerController@deleteTrash')->name('producer.deleteTrash');
        Route::resource('/producer', 'ProducerController');

         //bill
         Route::get('/bill/dataBill', 'BillController@dataBill')->name('bill.dataBill');
         Route::get('/bill/billDetail', 'BillController@billDetail')->name('bill.billDetail');
         Route::get('/bill/dataBillDetail', 'BillController@dataBillDetail')->name('bill.dataBillDetail');
         Route::delete('/bill/destroybillDetail/{id}', 'BillController@destroybillDetail')->name('bill.destroybillDetail');
         Route::resource('/bill', 'BillController');
         

        //dashboard
        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
         //slide
         Route::resource('/slide', 'SlideController');

         //comment
         Route::get('/comment/show/{id}', 'CommentController@show')->name('comment.show');
        Route::resource('/comment', 'CommentController');

        //Import-export User
        // Route::get('importExportView', [ImportController::class, 'importExportView']);
        Route::get('export', [ImportController::class, 'export'])->name('export');
        Route::post('import', [ImportController::class, 'import'])->name('import');
        //Import-export Category

        // Route::get('categoryimportExportView', 'CategoryController@categoryimportExportView');
        Route::get('category-export', 'CategoryController@export')->name('category_export');
        Route::post('category-import', 'CategoryController@import')->name('category_import');

        //Import-export Producer

        // Route::get('producerimportExportView', 'ProducerController@producerimportExportView');
        Route::get('producer-export', 'ProducerController@export')->name('producer_export');
        Route::post('producer-import', 'ProducerController@import')->name('producer_import');
        //Import-export Product

        // Route::get('productimportExportView', 'ProductController@productimportExportView');
        Route::get('product-export', 'ProductController@export')->name('product_export');
        Route::post('product-import', 'ProductController@import')->name('product_import');
    });
});

Route::middleware(['auth'])->group(function(){

    

    
    Route::resource('/details', 'ChangePasswordController');
    Route::post('/user/changaddress', 'ChangePasswordController@postChangeAddress')->name('change_address');
    Route::get('/user/account/profile', 'ChangePasswordController@edit')->name('details.profile');
    Route::get('/password', 'ChangePasswordController@index')->name('password');
    
    //Change email
    Route::get('/user/account/email/', 'ChangePasswordController@getEmailVerify')->name('email');
    Route::post('/user/account/email/', 'ChangePasswordController@postEmailVerify')->name('verifyemail')->middleware('verified');
    
    //Change phone
    Route::get('/user/account/phone/', 'ChangePasswordController@getUpdatePhone')->name('phoneNumber');
    Route::post('/user/account/phone/', 'ChangePasswordController@postUpdatePhone')->name('verifyPhone');

    //Add cart
    Route::get('/remove/cart/{id}', 'CartController@deleteCart')->name('deleteCart');
    Route::get('/addCartPost/{id}/{qty}', 'CartController@addCartPost')->name('addCartPost');
    Route::get('/saveCart/{id}/{quantity}', 'CartController@saveListItemCart')->name('saveListItemCart');
    Route::get('/deleteListCart/{id}', 'CartController@deleteListCart')->name('deleteListCart');
    Route::get('/updatedeleteCart', 'CartController@updatedeleteCart')->name('updatedeleteCart');
    Route::resource('/cartt', 'CartController');
});

//layouts
Route::get('/', 'PageController@home')->name('gumdamstore');
Route::get('/gumdamstore', 'PageController@home')->name('gumdamstore');
Route::get('/cart', 'PageController@cart')->name('cart');
Route::get('/shop', 'PageController@shop')->name('shop');
Route::get('/getDetailProduct', 'PageController@getDetailProduct')->name('getDetailProduct');
Route::get('/categoryDetail/{slug}', 'PageController@categoryDetail')->name('categoryDetail');

//Find bill in page your order
Route::get('/bills/search/{id}', 'PageController@findbill')->name('find.bills');

Route::get('/product/detail/{id}', 'PageController@productdetail')->name('productdetail');

Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/error', 'PageController@error')->name('error');

Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');