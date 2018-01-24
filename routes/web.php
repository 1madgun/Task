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

Route::get('/', function () {
    return redirect()->route('post.index');
})->name('index');

Route::get('post/data', 'PostController@data')->name('post.data');
Route::get('post/profil', 'PostController@profil')->name('post.profil');
Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');
Route::resource('profil', 'ProfilController');

Auth::routes();