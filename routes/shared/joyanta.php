<?php

// Route::get('joyanta', 'Api\YourController@funcName');

use Illuminate\Support\Facades\Route;

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

Route::get('selection', 'SelectionTaskController@index')->name('selection');

Route::get('cunrrencyTask', 'CurrencyTaskController@index')->name('currencyTask');

Route::get('currency', 'CurrencyTaskController@index')->name('currency');