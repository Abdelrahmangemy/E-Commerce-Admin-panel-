<?php
//admin group

Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');
Route::get('/admin/setting', 'Admin\SettingController@index')->name('setting.index');
Route::post('/admin/setting','Admin\SettingController@update')->name('setting.update');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    //Page
    Route::resource('pages','PageController');
    //Slider
    Route::resource('sliders','SliderController');
    //Menu
    Route::resource('menus','MenuController');
    //Contact
    Route::resource('contacts','Admin\ContactController',['only' => ['index' , 'show' , 'destroy']]);
    //Order
    Route::resource('orders','OrderController');

});


//all visitors group 
require_once __DIR__ . '/visitor.php';


