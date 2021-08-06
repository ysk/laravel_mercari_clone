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

Route::get('/', 'HomeController@index')->name('top');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('sell', 'SellController@showSellForm')->name('sell');
    Route::prefix('mypage')->group(function() {
        Route::get('edit-profile', 'MyPage\ProfileController@showProfileEditForm')->name('mypage.edit-profile');
        Route::post('edit-profile', 'MyPage\ProfileController@editProfile')->name('mypage.edit-profile');
    });
});

