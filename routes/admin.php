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

    Route::get('/role/create', 'Admin\RoleController@create')->name('role.create');
    Route::post('/role/store', 'Admin\RoleController@store')->name('role.store');
    Route::get('/role/fetch', 'Admin\RoleController@fetch')->name('role.fetch');
    Route::get('/role/delete/{id}', 'Admin\RoleController@delete')->name('role.delete');
    Route::get('/role/search', 'Admin\RoleController@search')->name('role.search');
    Route::get('/role/getPermission', 'Admin\RoleController@getPermission')->name('role.getPermission');
    Route::get('/role/fetchPermission/{id}', 'Admin\RoleController@fetchPermission')->name('role.fetchPermission');

    Route::get('/get-roles', 'Admin\AdminController@getRoles')->name('admin.get.roles');
    Route::get('/fetch', 'Admin\AdminController@fetch')->name('admin.fetch');
    Route::get('/search', 'Admin\AdminController@search')->name('admin.search');
    Route::get('/fetchRole/{id}', 'Admin\AdminController@fetchRole')->name('admin.fetchRole');
    Route::get('/delete/{id}', 'Admin\AdminController@delete')->name('admin.delete');

    Route::get('/category', 'Admin\CategoryController@index')->name('category');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('category.create');
    Route::post('/category/store', 'Admin\CategoryController@store')->name('category.store');

});

