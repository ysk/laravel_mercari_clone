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


Auth::routes();

//商品一覧・詳細
Route::get('/', 'ItemsController@showItems')->name('top');
Route::get('items/{item}', 'ItemsController@showItemDetail')->name('item');

Route::middleware('auth')->group(function () {

    //出品
    Route::get('sell', 'SellController@showSellForm')->name('sell');
    Route::post('sell', 'SellController@sellItem')->name('sell');

    //購入
    Route::get('items/{item}/buy', 'ItemsController@showBuyItemForm')->name('item.buy');
    Route::post('items/{item}/buy', 'ItemsController@buyItem')->name('item.buy');

    Route::prefix('mypage')->namespace('MyPage')->group(function() {
        //マイページ
        Route::get('edit-profile', 'ProfileController@showProfileEditForm')->name('mypage.edit-profile');
        Route::post('edit-profile', 'ProfileController@editProfile')->name('mypage.edit-profile');
        Route::get('sold-items', 'SoldItemsController@showSoldItems')->name('mypage.sold-items');
    });
});

