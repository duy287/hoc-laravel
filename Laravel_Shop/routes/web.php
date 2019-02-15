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

Route::get('/','IndexController@getTrangChu');
Route::get('trang-chu','IndexController@getTrangChu');

Route::get('product-type/{id_type}','TypeController@getProductsByType');

Route::get('product-detail/{id}', 'ProductController@getProductDetail');

Route::get('login','UserController@getLogin');
Route::post('login','UserController@postLogin');
Route::get('logout','UserController@getLogout');

Route::get('dang-ky','UserController@getSignup');
Route::post('dang-ky','UserController@postSignup');

Route::get('shopping-cart', 'CartController@getShoppingCart');
Route::post('shopping-cart/add','CartController@addItem');
Route::post('shopping-cart/update','CartController@updateItem');
Route::post('shopping-cart/delete','CartController@deleteItem');
Route::get('shopping-cart/destroy','CartController@destroyCart');

Route::get('checkout',function(){
    return view('checkout');
});

//tạo user mới
Route::get('create-user',function(){
    $user = new App\User;
    $user->full_name= 'test';
    $user->email = 'lehoangduy287@gmail.com';
    $user->password= bcrypt('test');
    $user->phone ='01697524982';
    $user->address = 'Q11 TPHCM';
    $user->save();
});

//Resfull api
Route::resource('sanpham','ResController');