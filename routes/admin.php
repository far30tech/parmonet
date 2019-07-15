<?php

Route::prefix('admin')->group(function () {
    Route::get('/test', function () {
        return view('admin.test');
    });
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

    
    Route::get('/category/create', 'Admin\CategoryController@create')->name('category.create');
    Route::post('/category/store', 'Admin\CategoryController@store')->name('category.store');
    Route::get('/category/fetch', 'Admin\CategoryController@fetch')->name('category.fetch');
    Route::get('/category/fetchsubcat/{id}', 'Admin\CategoryController@fetchsubcat')->name('category.fetchsubcat');
    Route::get('/category/fetchsubsubcat/{id}', 'Admin\CategoryController@fetchsubsubcat')->name('category.fetchsubsubcat');
    Route::get('/category/fetchsubs/{id}', 'Admin\CategoryController@fetchsubs')->name('category.fetchsubs');
    Route::get('/category', 'Admin\CategoryController@index')->name('category.index');
    Route::get('/category/delete/{id}', 'Admin\CategoryController@delete')->name('category.delete');
    Route::get('/category/search', 'Admin\CategoryController@search')->name('category.search');

});



