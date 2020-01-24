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
Auth::routes(['verify' => true]);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->middleware(['auth','verified','checkprofile'])->name('home');

Route::get('/', 'MasterController@home')->middleware(['auth','verified','checkprofile'])->name('master');

Route::get('/master/{vue_capture?}', 'MasterController@index')->where('vue_capture', '[\/\w\.-]*')->middleware(['auth','verified']);

Route::resource('/profiles', 'ProfilesController');

Route::post('/profiles/user', 'ProfilesController@editProfile');

Route::resource('/resumes', 'ResumesController');

Route::post('/resume/profile', 'ResumesController@getProfile');

Route::post('/resume/{slag}', 'ResumesController@getResume');
