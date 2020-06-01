<?php

/*
|--------------------------------------------------------------------------
| web.php
|--------------------------------------------------------------------------
|
| Dit zijn alle routes van de website
| word geladen door de RouteServiceProvider
|
*/

/*
 */
Route::get('/', function () {
    return redirect('rooms');
});

Route::get('/admin', function () {
    return redirect('admin/rooms');
});

Route::resource('rooms', 'RoomsController');
Route::resource('users', 'UsersController');

Auth::routes();

Route::get('/profile', 'PagesController@profile')->name('profile');
Route::get('/bookings', 'PagesController@bookings')->name('bookings');
Route::get('/admin/documentation', 'PagesController@documentation')->name('documentation');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');


    Route::resource('users', 'Admin\UsersController');


    Route::resource('rooms', 'Admin\RoomsController');
    Route::resource('bookings', 'Admin\BookingsController', ['except' => 'bookings.create']);
     Route::get('bookings/create/', ['as' => 'bookings.create', 'uses' => 'Admin\BookingsController@create']);
});