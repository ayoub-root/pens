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

// the main index - Home - route
Route::get('/', 'HomeController@index')->name('home');
// Novel routes
Route::resource('novels', 'NovelController');
// Chapter routes
Route::resource('chapters', 'ChapterController')->except('create');
Route::get('/chapters/create/{novel_id}', 'ChapterController@create')->name('chapters.create');


Route::get('/profile', 'DashboardController@index')->name('profile');

Auth::routes();
