<?php

use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/profile', function () {
    return "Selamat datang di halaman profile";
});

Route::get('/user/{userId}/post/{postId?}', function (Request $request) {
    return "User Id " . $request->userId . "memiliki postingan dengan Post Id " . $request->postId;
});
