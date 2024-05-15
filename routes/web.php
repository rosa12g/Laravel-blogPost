<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\http\Controllers\UserController;
Route::get('/', function () {
    $posts=Post::all();
    return view('home',['posts'=>$posts]);
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);   
Route::post('/login', [UserController::class, 'login']); 
Route::post('/create-post', [PostController::class, 'createPost']);
