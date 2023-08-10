<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MovieController;
use App\Http\Controllers\FeedbackController;
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


Route::get('/feedback', [FeedbackController::class, 'feedback']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/Registration', [AuthController::class, 'Register'])->name('Registration');
Route::post('/Registration', [AuthController::class, 'RegisterPost'])->name('RegisterPost');


Route::prefix('dashboard')->middleware([])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('movie')->group(function () {
        Route::get('/list_movie', [MovieController::class, 'list_movie'])->name('dashboard.movie.list_movie');
        Route::get('/create_movie', [MovieController::class, 'create_movie'])->name('dashboard.movie.create_movie');
        Route::post('/create_movie', [MovieController::class, 'store_movie'])->name('dashboard.movie.store_movie');
        Route::get('/create_genre', [MovieController::class, 'create_genre'])->name('dashboard.movie.create_genre');
        Route::post('/create_genre', [MovieController::class, 'store_genre'])->name('dashboard.movie.store_genre');
    });
    Route::prefix('provider')->group(function () {
        Route::get('/add', [MovieController::class, 'create_movie'])->name('dashboard.movie.create_movie');
        Route::post('/add', [MovieController::class, 'store_movie'])->name('dashboard.movie.store_movie');
        Route::get('/create_genre', [MovieController::class, 'create_genre'])->name('dashboard.movie.create_genre');
        Route::post('/create_genre', [MovieController::class, 'store_genre'])->name('dashboard.movie.store_genre');
    });
    Route::prefix('feedback')->group(function () {

        Route::POST('/postFeedback', [FeedbackController::class, 'store']); //admin
        Route::get('/viewFeedback', [FeedbackController::class, 'showAll'])->name('dashboard.feedback.viewFeedback');
        Route::get('/destroyFeedback/{id}', [FeedbackController::class, 'destroy']);
        Route::get('/viewEditFeedback/{id?}', [FeedbackController::class, 'viewUpdate']);
        Route::post('/editFeedback', [FeedbackController::class, 'update']);
    });
});
