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

// ('このURLのとき', 'コントローラ@メソッド')
Route::get('/', 'DiaryController@index')->name('diary.index');
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    // この中に書かれたルートはログインしていないと見れなくなる

    Route::get('/diary/create', 'DiaryController@create')->name('diary.create');
    // Route::get('/diary/create', 'DiaryController@create')->('好きな名前');
    Route::post('/diary/store', 'DiaryController@store')->name('diary.store');
    Route::delete('/diary/{id}', 'DiaryController@destroy')->name('diary.destroy');
    Route::get('/diary/{diary}/edit', 'DiaryController@edit')->name('diary.edit');
    Route::put('/diary/{id}/update', 'DiaryController@update')->name('diary.update');
});