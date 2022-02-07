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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest_management', function () {
    return view('GuestManagement.index');
});

Route::get('/pass_guests_info', 'GuestController@pass_guests_info')->name('pass_guests_info');

// Route::get('pass_guests_info', 'GuestController@pass_guests_info')->name('pass_guests_info');

// Route::get('guest_management_another', 'GuestController@any')->name('guest_management_another');

Route::get('/guest_management_another', function () {
    // Session::flush();
    return view('GuestManagement.pass_guests_info');
});

Route::get('/another_info', function () {
    // Session::flush();
    return view('GuestManagement.another_info');
});

Route::post('/save', 'GuestController@store')->name('save');

Route::get('/service', function () {
    // Session::flush();
    return view('ServiceManagement.index');
});

Route::get('serviceDetailsShow','ServiceController@serviceDetailsShow');

Route::get('/calculation', function () {
    // Session::flush();
    return view('ServiceManagement.calculation');
});

Route::get('showFields', 'ServiceController@showFields');