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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::match(array('GET','POST'),'/login', 'UserController@login')->name('login');

Route::get('/logout', function () {
    if(session()->has('user_id')){
        session()->pull('user_id');
    }
    return redirect()->route('home');
})->name('logout');
