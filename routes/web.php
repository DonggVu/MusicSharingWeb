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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//upload
Route::get('upload', 'TrackController@getUploadForm')->middleware('auth');

Route::post('upload', 'TrackController@uploadFile') -> name('upload');
//admin
Route::get('admin', 'AdminController@getView');

Route::get('admin/user/', 'AdminController@getUserView');

Route::get('admin/track/', 'AdminController@getTrackView');

Route::get('admin/playlist', 'AdminController@getPlaylistView');

Route::put('admin/user', 'AdminController@updateUser');

Route::delete('admin/user', 'AdminController@deleteUser');

Route::put('admin/track', 'AdminController@updateTrack');

Route::delete('admin/track', 'AdminController@deleteTrack');

Route::put('admin/playlist', 'AdminController@updatePlaylist');

Route::delete('admin/playlist', 'AdminController@deletePlaylist');
