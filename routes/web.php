<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);
//route resource
// Route::resource('/posts', \App\Http\Controllers\PostController::class);

//route resource
// Route::resource('/students', \App\Http\Controllers\StudentController::class);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('students', StudentController::class);
});
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('posts', PostController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
