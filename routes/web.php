<?php

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

Route::get('/', function () {
    return redirect()->route('admin.dashboard.index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth:web']], function() {
    Route::resource('dashboard', 'Home\DashboardController');

    Route::resource('transaction', 'transaction\transactionController');

    Route::get('logout', 'Auth\LoginController@destroy')->name('logout');
});

Route::get('auth', 'Admin\Auth\LoginController@index')->name('admin.login.index')->middleware(['guest']);
Route::post('auth', 'Admin\Auth\LoginController@store')->name('admin.login.store');
