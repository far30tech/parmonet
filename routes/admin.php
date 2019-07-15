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
    Route::get('/permission/fetch', 'Admin\PermissionController@fetch')->name('permission.fetch');
    Route::get('/permission/delete/{id}', 'Admin\PermissionController@delete')->name('permission.delete');
    Route::get('/permission/search', 'Admin\PermissionController@search')->name('permission.search');

    Route::get('/category', 'Admin\CategoryController@index')->name('category');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('category.create');
    Route::post('/category/store', 'Admin\CategoryController@store')->name('category.store');

});



