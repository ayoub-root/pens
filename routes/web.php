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


// novelReviews routes
Route::resource('novelReviews', 'NovelReviewController')->except(['create', 'store']);
Route::post('/novelReviews/store/{novel_id}', 'NovelReviewController@store')->name('novelReviews.store');


// chapterComments routes
Route::resource('chapterComments', 'ChapterCommentController')->except(['create', 'store']);
Route::post('/chapterComments/store/{chapter_id}', 'ChapterCommentController@store')->name('chapterComments.store');


// Chapter routes
Route::resource('chapters', 'ChapterController')->except('create');
Route::get('/chapters/create/{novel_id}', 'ChapterController@create')->name('chapters.create');


Route::get('/profile', 'DashboardController@index')->name('profile');

Auth::routes();
