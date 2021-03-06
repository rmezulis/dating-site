<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});
Route::get('/members/', 'SwipeController@show')->name('swipe.show');
Route::post('/members/{user}/like', 'SwipeController@like')->name('swipe.like');
Route::post('/members/{user}/pass', 'SwipeController@pass')->name('swipe.pass');
Route::get('/profile/new', 'ProfileController@create')->name('profile.create');
Route::post('/profile/new', 'ProfileController@store')->name('profile.store');
Route::get('/profile', 'ProfileController@show')->name('profile.show');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/edit', 'ProfileController@update')->name('profile.update');
Route::get('/profile/pictures/edit', 'PictureController@edit')->name('pictures.edit');
Route::post('/profile/pictures/edit', 'PictureController@store')->name('pictures.store');
Route::delete('/profile/pictures/delete/{picture}', 'PictureController@delete')->name('picture.delete');
Route::get('/settings', 'SettingController@edit')->name('settings.show');
Route::patch('/settings', 'SettingController@update')->name('settings.update');
Route::get('/matches', 'SwipeController@matches')->name('matches.all');
Route::get('/matches/{user}', 'SwipeController@match')->name('matches.profile');


