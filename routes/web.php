<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

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
//Trang index
Route::get('/','HomeController@index' );
Route::get('/trangchu','HomeController@index');

//tìm kiếm
Route::post('/tim-kiem','HomeController@search');


//Hiện sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}','HomeController@show_category');
Route::get('/thuong-hieu-san-pham/{brand_id}','HomeController@show_brand');

//Chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{product_id}','HomeController@details_product');


//Login
Route::get('/login','AdminController@index');
Route::get('/logout','AdminController@logout');
Route::get('/admin-dashboard','AdminController@showDashboard');
Route::post('/admin-dashboard','AdminController@Dashboard');

//Category Product
Route::get('/all-category-product','CategoryProductController@all_category_product');

Route::get('/add-category-product','CategoryProductController@add_category_product');
Route::post('/save-category-product','CategoryProductController@save_category_product');

Route::get('/edit-category-product/{category_product_id}','CategoryProductController@edit_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProductController@update_category_product');

Route::get('/delete-category-product/{category_product_id}','CategoryProductController@delete_category_product');

// Brand Product
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');

Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');

Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');

//Product
Route::get('/all-product','Product@all_product');

Route::get('/add-product','Product@add_product');
Route::post('/save-product','Product@save_product');

Route::get('/edit-product/{product_id}','Product@edit_product');
Route::post('/update-product/{product_id}','Product@update_product');

Route::get('/delete-product/{product_id}','Product@delete_product');

//Cart
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');

Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');

Route::post('/update-cart-quantity','CartController@update_cart_quantity');

//Check out

Route::get('/login-checkout','CheckoutController@login_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/login-customer','CheckoutController@login_customer');

Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');

Route::get('/payment','CheckoutController@payment');

//Order 
Route::post('/order-place','CheckoutController@order_place');
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{orderId}','CheckoutController@view_order');
Route::get('/confirm-order/{orderId}','CheckoutController@confirm_order');
Route::get('/delete-order/{orderId}','CheckoutController@delete_order');










