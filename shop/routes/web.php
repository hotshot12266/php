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

Route::get('index', [
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}', [
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id?}', [
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);

Route::get('lien-he', [
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);

Route::get('gioi-thieu', [
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}', [
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}', [
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang', [
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang', [
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap', [
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap', [
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ki', [
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki', [
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat', [
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);

Route::get('search', [
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
/////////////////////////////////////////////////////////////////////////////////////////////////////////
// Route::get('search1', [
// 	'as'=>'search',
// 	'uses'=>'PageController@getSearch'
// ]);
/////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('login/{provider}', [
	'as'=>'provider_login',
	'uses'=>'PageController@redirectToProvider'
]);

Route::get('login/{provider}/callback', [
	'as'=>'provider_login_callback',
	'uses'=>'PageController@handleProviderCallback'
]);

Route::post('send','PageController@send');
/////////////////////////////////////////////////////////////////////////////////

Route::get('ad/dangnhap','UserController@getDangnhapAdmin');
Route::post('ad/dangnhap','UserController@postDangnhapAdmin');
Route::get('ad/logout','UserController@getDangXuatAdmin');


//Route::group(['prefix'=>'ad','middleware'=>'adminLogin'],function(){
Route::group(['prefix'=>'ad','middleware'=>'adminLogin'],function(){

	
	Route::group(['prefix'=>'product_type'],function(){
		//admin/loai/them
		Route::get('danhsach','Product_TypeController@getDanhSach');
		////////////////////////////////////////////////////////
		Route::get('sua/{id}','Product_TypeController@getSua');
		Route::post('sua/{id}','Product_TypeController@postSua');
		///////////////////////////////////////////////////////
		Route::get('them','Product_TypeController@getThem');
		Route::post('them','Product_TypeController@postThem');
		//////////////////////////////////////////////////////
		Route::get('xoa/{id}','Product_TypeController@getXoa');

	});
	Route::group(['prefix'=>'products'],function(){
		//admin/loai/them
		Route::get('danhsach','ProductController@getDanhSach');
		////////////////////////////////////////////////////////
		Route::get('sua/{id}','ProductController@getSua');
		Route::post('sua/{id}','ProductController@postSua');
		///////////////////////////////////////////////////////
		Route::get('them','ProductController@getThem');
		Route::post('them','ProductController@postThem');
		//////////////////////////////////////////////////////
		Route::get('xoa/{id}','ProductController@getXoa');

	});
	Route::group(['prefix'=>'users'],function(){
		//admin/loai/them
		Route::get('danhsach','UserController@getDanhSach');
		////////////////////////////////////////////////////////
		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');
		///////////////////////////////////////////////////////
		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');
		//////////////////////////////////////////////////////
		Route::get('xoa/{id}','UserController@getXoa');

	});
	Route::group(['prefix'=>'slide'],function(){
		//admin/loai/them
		Route::get('danhsach','SlideController@getDanhSach');
		////////////////////////////////////////////////////////
		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');
		///////////////////////////////////////////////////////
		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');
		//////////////////////////////////////////////////////
		Route::get('xoa/{id}','SlideController@getXoa');

	});
	Route::group(['prefix'=>'bill_detail'],function(){
		//admin/loai/them
		Route::get('danhsach','BillController@getDanhSach');
		////////////////////////////////////////////////////////
		Route::get('xoa/{id}','BillController@getXoa');

	});
}); 
