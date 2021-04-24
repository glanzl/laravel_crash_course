<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

// Route::get('/', function () {return view('welcome');});
// Route::get('/posts', function () {return view('posts.index');});


Route::get('register',[RegisterController::class,'index'])->name('register');
Route::post('register',[RegisterController::class,'store']);

