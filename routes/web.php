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
        Route::get('/add', [MovieController::class, 'add'])->name('dashboard.movie.add');
        Route::post('/add', [MovieController::class, 'store'])->name('dashboard.movie.store');
        Route::get('/create_genre', [MovieController::class, 'create_genre'])->name('dashboard.movie.create_genre');
    });
});
