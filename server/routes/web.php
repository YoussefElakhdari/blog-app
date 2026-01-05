<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
//
//les Routes profiles
Route::get('/profiles',[AuthController::class,'index']);
Route::post('/profiles/register',[AuthController::class,'register']);
Route::get('/profiles/{id}',[AuthController::class,'show']);
Route::delete('/profiles/{id}',[AuthController::class,'destroy']);
Route::put('/profiles/{id}',[AuthController::class,'update']);
Route::post('/profiles/login',[AuthController::class,'login']);
//les Routes posts
Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::post('/posts',[PostController::class,'store']);
Route::get('/posts/{id}',[PostController::class,'show']);
Route::get('/posts/{id}',[PostController::class,'show']);
Route::delete('/posts/{id}',[PostController::class,'destroy']);
Route::put('/posts/{id}',[PostController::class,'update']);
=======
Route::get('/test', function () {
    return response()->json(['message' => 'Test works']);
});
>>>>>>> 7fea2ee4c177ececd28e2a57b9880067fb93e957

