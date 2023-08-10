<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MovieController;
use App\Http\Controllers\Home\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/Registration', [AuthController::class, 'Register'])->name('Registration');
Route::post('/Registration', [AuthController::class, 'RegisterPost'])->name('RegisterPost');


Route::prefix('dashboard')->middleware([])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('movie')->group(function () {
        Route::get('/', [MovieController::class, 'list_movie'])->name('dashboard.movie.list_movie');
        Route::get('/{id}', [MovieController::class, 'detail_movie'])->where(['id' => '[0-9]+'])->name('dashboard.movie.detail_movie');
        Route::get('/list_movie', [MovieController::class, 'list_movie'])->name('dashboard.movie.list_movie');

        Route::get('/edit/{id?}', [MovieController::class, 'edit_movie'])->where(['id' => '[0-9]+'])->name('dashboard.movie.edit_movie');
        Route::post('/edit/{id?}', [MovieController::class, 'update_movie'])->where(['id' => '[0-9]+'])->name('dashboard.movie.update_movie');

        Route::get('/create_movie', [MovieController::class, 'create_movie'])->name('dashboard.movie.create_movie');
        Route::post('/create_movie', [MovieController::class, 'store_movie'])->name('dashboard.movie.store_movie');


        Route::get('/create_genre', [MovieController::class, 'create_genre'])->name('dashboard.movie.create_genre');
        Route::post('/create_genre', [MovieController::class, 'store_genre'])->name('dashboard.movie.store_genre');


    });
    Route::prefix('provider')->group(function () {
        // Route::get('/add', [MovieController::class, 'create_movie'])->name('dashboard.movie.create_movie');
        // Route::post('/add', [MovieController::class, 'store_movie'])->name('dashboard.movie.store_movie');
        // Route::get('/create_genre', [MovieController::class, 'create_genre'])->name('dashboard.movie.create_genre');
        // Route::post('/create_genre', [MovieController::class, 'store_genre'])->name('dashboard.movie.store_genre');
    });
});
