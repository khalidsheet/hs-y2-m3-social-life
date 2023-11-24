<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('post.login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('post.register');
    Route::get('/auth/verification', function () {
        return view('auth.email-verification');
    })->name('auth.verify-account');
    Route::get('/auth/verify', [AuthController::class, 'verifyAccount'])->name('auth.verify');
});

Route::group(['middleware' => "auth"], function () {
    Route::group(["prefix" => "auth"], function () {
        Route::post("/logout", [AuthController::class, "logout"])->name("logout");
    });

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::prefix('post')->group(function () {
        Route::post('/', [PostController::class, 'store'])->name('post.publish');
        Route::get('{id}/details', [PostController::class, 'getPostDetails'])->name('get.post.details');
    });

    Route::prefix('comment')->group(function () {
        Route::post('', [CommentController::class, 'writeComment'])->name('comment');
    });

    Route::prefix('like')->group(function () {
        Route::post('', [LikeController::class, 'like'])->name('like');
    });

    Route::prefix('follow')->group(function () {
        Route::post('', [FollowController::class, 'followRequest'])->name('follow');
        Route::post('accept', [FollowController::class, 'acceptIncomingFollowRequest'])->name('follow.accept');
        Route::post('decline', [FollowController::class, 'declineIncomingFollowRequest'])->name('follow.decline');
        Route::post('cancel-outgoing', [FollowController::class, 'cancelOutgoingRequest'])->name('follow.cancel');
    });

    Route::get("people", [UserController::class, 'getPeople'])->name('get.people');
    Route::get('explore', [PostController::class, 'getExplore'])->name('explore');
});
