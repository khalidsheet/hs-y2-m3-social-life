<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
});

Route::group(['middleware' => "auth"], function () {
    Route::group(["prefix" => "auth"], function () {
        Route::post("/logout", [AuthController::class, "logout"])->name("logout");
    });

    Route::get('/', [HomeController::class, 'index'])->name('home');
});
