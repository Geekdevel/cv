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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->middleware(['auth','verified'])->name('home');

Route::get('/master', 'MasterController@index')->middleware(['auth','verified']);

Route::get('/levels/all', 'MasterController@allLevels');

//Route::post('/createprofile', 'MasterController@createProfile');

Route::resource('/profiles', 'ProfilesController');

Route::post('/profiles/user', 'ProfilesController@editProfile');

Route::resource('/summarios', 'ResumesController');

Route::post('/summarios/profile', 'ResumesController@getProfile');
