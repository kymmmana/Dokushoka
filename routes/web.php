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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ranking/want', 'RankingController@want')->name('ranking.want');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('books', 'BooksController', ['only' => ['create', 'show']]);
    Route::post('want', 'BookUserController@want')->name('book_user.want');
    Route::delete('want', 'BookUserController@dont_want')->name('book_user.dont_want');
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});
