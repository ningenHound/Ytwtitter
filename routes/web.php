<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\TweetController;

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

// Route::get('/', function () {
    
//     $password = bcrypt('111');
//     dd($password);
//     //return view('welcome');
// });

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create']);

Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index']);

    Route::get('/follow/{name}', [FollowController::class, 'follow']);

    Route::get('/stopFollow/{name}', [FollowController::class, 'endFollow']);

    Route::post('/postTweet', [TweetController::class, 'create']);

    Route::get('/{name}', [HomeController::class, 'profile']);
});



