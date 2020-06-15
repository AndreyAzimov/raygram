<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/p/create', 'PostController@create')->name('post.create');
Route::post('/p', 'PostController@store')->name('post.store');
Route::get('/p/{post}', 'PostController@show')->name('post.show');
Route::get('/p/{post}/edit', 'PostController@edit')->name('post.edit');
Route::put('/p/{post}', 'PostController@update')->name('post.update');
Route::delete('/p/{post}', 'PostController@destroy')->name('post.delete');

Route::get('/accounts/{user:username}', 'ProfileController@edit')->name('profile.edit');

Route::get('/{user:username}', 'ProfileController@show')->name('profile.show');
//Route::get('/profile/{user:username}/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('/{user}', 'ProfileController@update')->name('profile.update');
Route::delete('/{user}', 'ProfileController@destroy')->name('profile.delete');

