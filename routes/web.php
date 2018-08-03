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
Route::get('events','EventsController@index')->name('events.index');
Route::get('events/{event}','EventsController@show')->name('events.show');
Route::get('events/apply/{event}','EventsController@apply')->name('events.apply');
Route::get('events/result/{event}','EventsController@result')->name('events.result');


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
Route::get('/menus/count','MenusController@show')->name('menus.count');


//订单管理
Route::get('/orders','OrdersController@index')->name('orders.index');
Route::get('/orders/{order}','OrdersController@show')->name('orders.show');
Route::get('/orders/{status}/edit','OrdersController@edit')->name('orders.edit');
Route::post('/orders','OrdersController@count')->name('orders.count');
//

