<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});

//
//les Routes profiles
Route::get('/profiles',[AuthController::class,'index']);
Route::post('/profiles/register',[AuthController::class,'register']);
Route::get('/profiles/{id}',[AuthController::class,'show']);
Route::delete('/profiles/{id}',[AuthController::class,'destroy']);
Route::put('/profiles/{id}',[AuthController::class,'update']);
//les Routes posts
Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::post('/posts',[PostController::class,'store']);
Route::get('/posts/{id}',[PostController::class,'show']);
Route::get('/posts/{id}',[PostController::class,'show']);
Route::delete('/posts/{id}',[PostController::class,'destroy']);
Route::put('/posts/{id}',[PostController::class,'update']);

