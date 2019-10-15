<?php 

    #Ajax
    #Route::resource('/admin/data','Admin\UserController');


    #load
    Route::get('/admin','Admin\HomeController@index')->name('admin.home');
    //settings
    Route::get('/admin/setting','Admin\SettingController@index')->name('setting.index');
    Route::post('/admin/setting','Admin\SettingController@update')->name('setting.update');

    //user 
    //Route::resource('/admin/user', 'Admin\UserController');
    

?>