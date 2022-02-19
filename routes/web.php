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

// Route::get('/', function () {
//     return view('welcome');
// });

//Làm đăng kí đăng nhập

Auth::routes();
Route::group(['namespace' => 'Auth'], function () {
    // Dang ky
    Route::get('dang-ky', 'RegisterController@getRegister')->name('get.register');
    Route::post('dang-ky', 'RegisterController@postRegister')->name('post.register');
    // Dang nhap
    Route::get('dang-nhap', 'LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap', 'LoginController@postLogin')->name('post.login');
    // Dang xuat    
    Route::get('dang-xuat', 'LoginController@getLogout')->name('get.logout.user');
});
// Xem ,khách thăm
Route::get('/','HomeController@index')->name('home');
Route::get('danh-muc/{slug}-{id}', 'CategoryController@getListProduct')->name('get.list.product');
Route::get('sanpham/{slug}-{id}', 'ProductDetailController@productDetail')->name('get.detail.product');

// Bài viết
Route::get('bai-viet', 'ArticleController@getListArticle')->name('get.list.article');
Route::get('bai-viet/{slug}-{id}', 'ArticleController@getDetailArticle')->name('get.detail.article');


//Gio hang  
Route::prefix('shopping')->group(function () {
    Route::get('/add/{id}', 'ShoppingCartController@addProduct')->name('add.shopping.cart');
    Route::get('/delete/{id}', 'ShoppingCartController@deleteProductItem')->name('delete.shopping.cart');
    Route::get('/danh-sach', 'ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
});
// Thanh toan, check dang nhap user
Route::group(['prefix' => 'gio-hang','middleware'=>'CheckLoginUser'],function () {
    Route::get('/thanh-toan', 'ShoppingCartController@getFormPay')->name('get.form.pay');
    Route::post('/thanh-toan', 'ShoppingCartController@saveInforShoppingCart');

});
// Nhóm route ajax lấy đánh giá
Route::group(['prefix' =>'ajax','middleware'=>'CheckLoginUser'],function () {
    Route::post('/danh-gia/{id}', 'RatingController@saveRating')->name('post.rating.product');
   
});
// Nhóm route ajax lấy sản phẩm đã xem
Route::group(['prefix' =>'ajax'],function () {
    Route::post('/view-product', 'HomeController@renderProductView')->name('post.product.view');
   
});

// Nhóm page static

Route::get('ve-chung-toi', 'PageStaticController@aboutUs')->name('get.about_us');
Route::get('thong-tin-giao-hang', 'PageStaticController@shipmentDetails')->name('get.shipment_details');
Route::get('chinh-sach-bao-mat', 'PageStaticController@privacyPolicy')->name('get.privacy_policy');
Route::get('dieu-khoan-su-dung', 'PageStaticController@termsOfUse')->name('get.terms_of_use');

Route::get('lien-he', 'ContactController@getContact')->name('get.contact');
Route::post('lien-he', 'ContactController@saveContact');
