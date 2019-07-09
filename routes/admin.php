<?php

Route::prefix('admin')->group(function () {

    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('register', 'Admin\AdminController@create')->name('admin.register');
    Route::post('register', 'Admin\AdminController@store')->name('admin.register.store');
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    Route::get('/roles', 'Admin\RoleController@index')->name('roles');
    Route::get('/role/create', 'Admin\RoleController@create')->name('role.create');

    Route::get('/permission/create', 'Admin\PermissionController@create')->name('permission.create');
    Route::post('/permission/store', 'Admin\PermissionController@store')->name('permission.store');

});



