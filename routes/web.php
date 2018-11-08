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

Route::resource('/stopcategory','Store\ShopCategoryController');

Route::resource('/shop','Store\ShopController');

Route::get('/shops/audit','Store\ShopController@audit')->name('shop.audit');

Route::get('/user','User\AdminUserController@register')->name('user.register');
Route::post('/user/register','User\AdminUserController@user')->name('user');
Route::get('/user/index','User\AdminUserController@index')->name('user.index');
Route::get('/user/door','User\AdminUserController@door')->name('user.door');
Route::post('/user/login','User\AdminUserController@login')->name('user.login');
Route::get('/user/destroy','User\AdminUserController@destroy')->name('user.destroy');
Route::get('/user/edit','User\AdminUserController@edit')->name('user.edit');
Route::post('/user/update','User\AdminUserController@update')->name('user.update');

Route::get('/merchant/index','Store\MerchantController@index')->name('merchant.index');
Route::get('/merchant/audit','Store\MerchantController@audit')->name('merchant.audit');
Route::get('/merchant/reset','Store\MerchantController@reset')->name('merchant.reset');

Route::post('upload','Store\MerchantController@upload')->name('upload');
//Route::post('upload','Menu\MenuController@upload')->name('upload');

Route::resource('/activity','Activity\ActivityController');

Route::get('/member/index','Member\MemberController@index')->name('member.index');
Route::get('/member/forbidden','Member\MemberController@forbidden')->name('member.forbidden');
Route::get('/member/bidden','Member\MemberController@bidden')->name('member.bidden');

Route::get('/power/add','User\PowerController@add')->name('power.add');
Route::get('/power/index','User\PowerController@index')->name('power.index');
Route::get('/power/modify/{permission}','User\PowerController@modify')->name('power.modify');
Route::post('/power/append','User\PowerController@append')->name('power.append');
Route::post('/power/update/{permission}','User\PowerController@update')->name('power.update');
Route::post('/power/destroy/{permission}','User\PowerController@destroy')->name('power.destroy');

Route::resource('/role','User\RoleController');

Route::get('/admin/add','User\AdminController@add')->name('admin.add');
Route::get('/admin/edit/{adminuser}','User\AdminController@edit')->name('admin.edit');
Route::post('/admin/append','User\AdminController@append')->name('admin.append');

Route::resource('/nav','Nav\NavController');
