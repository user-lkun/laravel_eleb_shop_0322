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

//Route::get('/','SessionsController@login');
Route::get('/','ShopsController@index')->name('shops.index');

Route::get('/shops/create','ShopsController@create')->name('shops.create');
Route::get('/shops','ShopsController@index')->name('shops.index');
Route::post('/shops','ShopsController@store')->name('shops.store');



//登录验证
Route::get('login','SessionsController@login')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
//退出
Route::delete('logout', 'SessionsController@destroy')->name('logout');


//商家个人中心

//Route::resource('membercenters', 'MemberCentersController');
//
Route::get('membercenters/show','MemberCentersController@show')->name('membercenters.show');
Route::get('membercenters/edit','MemberCentersController@edit')->name('membercenters.edit');
Route::patch('membercenters/{id}','MemberCentersController@save')->name('membercenters.save');


//菜品分类管理
Route::resource('menucategories','MenuCategoriesController');
Route::resource('menus','MenusController');

Route::resource('activies','ActiviesController');
//Route::get('/activies','ActiviesController@index')->name('activies.index');
//Route::get('/activies/{show}','ActiviesController@show')->name('activies.show');


//接受文件上传
Route::post('upload',function (){
    $storage = \Illuminate\Support\Facades\Storage::disk('oss');
    $fileName =  $storage->putFile('goods_img', request()->file('file'));
    return [
        'fileName'=>$storage->url($fileName)
    ];
})->name('upload');

Route::get('/','SessionsController@login');


Route::get('/shops/create','ShopsController@create')->name('shops.create');
Route::get('/shops','ShopsController@index')->name('shops.index');
Route::post('/shops','ShopsController@store')->name('shops.store');



//登录验证
Route::get('login','SessionsController@login')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
//退出
Route::delete('logout', 'SessionsController@destroy')->name('logout');


//商家个人中心

//Route::resource('membercenters', 'MemberCentersController');
//
Route::get('membercenters/show','MemberCentersController@show')->name('membercenters.show');
Route::get('membercenters/edit','MemberCentersController@edit')->name('membercenters.edit');
Route::patch('membercenters/{id}','MemberCentersController@save')->name('membercenters.save');


//菜品分类管理
Route::resource('menucategories','MenuCategoriesController');
Route::resource('menus','MenusController');

