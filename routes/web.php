<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MovieController;
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

Route::prefix('dashboard')->middleware([])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('movie')->group(function () {
        Route::get('/add', [MovieController::class, 'create_movie'])->name('dashboard.movie.create_movie');
        Route::post('/add', [MovieController::class, 'store_movie'])->name('dashboard.movie.store_movie');
        Route::get('/create_genre', [MovieController::class, 'create_genre'])->name('dashboard.movie.create_genre');
        Route::post('/create_genre', [MovieController::class, 'store_genre'])->name('dashboard.movie.store_genre');
    });
});
