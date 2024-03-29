<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(array('GET','POST'),'/', 'IndexController@index')->name('home');

Route::match(array('GET','POST'),'/login', 'UserController@login')->name('login');

Route::get('/logout', function () {
    if(session()->has('user_id')){
        session()->pull('user_id');
    }
    return redirect()->route('home');
})->name('logout');

Route::match(array('GET','POST'),'/signup', 'UserController@signup')->name('signup');

Route::match(array('GET','POST'),'/signup/details', 'UserController@signup_details')->name('signup_details');

Route::match(array('GET','POST'),'/signup/verification', 'UserController@signup_verification')->name('signup_verification');
Route::match(array('GET','POST'),'/settings/{id}', 'UserController@settings')->name('settings');
