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


// Route Đăng nhập Admin
Route::prefix('authenticate')->group(function(){
    Route::get('/login', 'AdminAuthController@getLogin')->name('admin.login');
    Route::post('/login', 'AdminAuthController@postLogin');
    // Đăng xuất
    Route::get('/dang-xuat', 'AdminAuthController@logoutAdmin')->name('admin.logout');


});

//Nhom Route Admin, check đăng nhập admin
Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function () {
    
    // Route admin home
    Route::get('/', 'AdminController@index')->name('admin.home');

    // Route group nhom cac Category route 
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create', 'AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create', 'AdminCategoryController@store');
        Route::get('/update{id}', 'AdminCategoryController@edit')->name('admin.get.edit.category');
        Route::post('/update{id}', 'AdminCategoryController@update');
        // cac hanh dong: Delete
        Route::get('/{action}/{id}', 'AdminCategoryController@action')->name('admin.get.action.category');
    });

    // Route group nhom cac Product route 
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'AdminProductController@index')->name('admin.get.list.product');
        Route::get('/create', 'AdminProductController@create')->name('admin.get.create.product');
        Route::post('/create', 'AdminProductController@store');
        Route::get('/update{id}', 'AdminProductController@edit')->name('admin.get.edit.product');
        Route::post('/update{id}', 'AdminProductController@update');
        // cac hanh dong: Delete
        Route::get('/{action}/{id}', 'AdminProductController@action')->name('admin.get.action.product');
    });

    // Route group nhom cac Article route 
    Route::group(['prefix' => 'article'], function () {
        Route::get('/', 'AdminArticleController@index')->name('admin.get.list.article');
        Route::get('/create', 'AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create', 'AdminArticleController@store');
        Route::get('/update{id}', 'AdminArticleController@edit')->name('admin.get.edit.article');
        Route::post('/update{id}', 'AdminArticleController@update');
        // cac hanh dong: Delete
        Route::get('/{action}/{id}', 'AdminArticleController@action')->name('admin.get.action.article');
    });

    // Route group nhom cac Transaction 

    // ql don hang 
    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/', 'AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/view/{id}','AdminTransactionController@viewOrder')->name('admin.get.view.order');
        // xử lý trạng thái đơn hàng
        Route::get('/active/{id}','AdminTransactionController@actionTransaction')->name('admin.get.active.transaction');
        
        // cac hanh dong: Delete hh
        Route::get('/{action}/{id}', 'AdminTransactionController@action')->name('admin.get.action.transaction');
    });
    // ql thanh vien
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'AdminUserController@index')->name('admin.get.list.user');
        // cac hanh dong: Delete hh
        // Route::get('/{delete}/{id}', 'AdminRatingController@deleteUser')->name('admin.get.delete.user');

    });

    // ql đánh giá
    Route::group(['prefix' => 'rating'], function () {
        Route::get('/', 'AdminRatingController@index')->name('admin.get.list.rating');
        // cac hanh dong: Delete hh
        Route::get('/{action}/{id}', 'AdminRatingController@action')->name('admin.get.action.rating');
    });

    // ql lien he 
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', 'AdminContactController@index')->name('admin.get.list.contact');
        Route::get('/action/{name}/{id}', 'AdminContactController@action')->name('admin.get.action.contact');
        Route::get('/{action}/{id}', 'AdminContactController@action')->name('admin.get.action.contact');
    });
    // ql page_static
    Route::group(['prefix'=> 'page-static'],function(){
        Route::get('/', 'AdminPageStaticController@index')->name('admin.get.list.page_static');
       
        Route::get('/create', 'AdminPageStaticController@create')->name('admin.get.create.page_static');
        Route::post('/create', 'AdminPageStaticController@store');
        Route::get('/update{id}', 'AdminPageStaticController@edit')->name('admin.get.edit.page_static');
        Route::post('/update{id}', 'AdminPageStaticController@update');
     // cac hanh dong: Delete
        Route::get('/{action}/{id}','AdminPageStaticController@action')->name('admin.get.action.page_static');
    
    });


});
