<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutDController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware(['auth']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutDController::class,'store'])->name('logout');


Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/user/{user:username}/posts', [UserPostController::class,'index'])->name('users.posts')->middleware(['auth']);


Route::get('/posts', [PostController::class,'index'])->name('posts')->middleware(['auth']);
Route::get('/posts/{post}/show', [PostController::class,'show'])->name('posts.show')->middleware(['auth']);

Route::post('/posts', [PostController::class,'store'])->middleware(['auth']);
Route::delete('/posts/{post}/delete', [PostController::class,'destory'])->middleware(['auth'])->name('posts.destory');


Route::post('/posts/{post}/likes', [PostLikeController::class,'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class,'destory'])->name('posts.likes');






