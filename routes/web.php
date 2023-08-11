<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MovieController;
use App\Http\Controllers\Home\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FAQController;
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

Route::get('/feedback', [FeedbackController::class, 'feedback'])->name('feedback'); //user view feedback


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/forget-password', [AuthController::class, 'forgetpass'])->name('forgetpass');
Route::post('/forget-password', [AuthController::class, 'forgetpassPost'])->name('forgetpassPost');
Route::get('/get-password/{user}/{token}', [AuthController::class, 'getpass'])->name('getpass');
Route::post('/get-password/{user}/{token}', [AuthController::class, 'getpassPost'])->name('getpassPost');
Route::get('/Registration', [AuthController::class, 'Register'])->name('Registration');
Route::post('/Registration', [AuthController::class, 'RegisterPost'])->name('RegisterPost');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::prefix('dashboard')->middleware([])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('movie')->group(function () {
        Route::get('/', [MovieController::class, 'list_movie'])->name('dashboard.movie.list_movie');
        Route::get('/{id}', [MovieController::class, 'detail_movie'])->where(['id' => '[0-9]+'])->name('dashboard.movie.detail_movie');
        Route::get('/list_movie', [MovieController::class, 'list_movie'])->name('dashboard.movie.list_movie');
        Route::get('/edit_movie/{id?}', [MovieController::class, 'edit_movie'])->where(['id' => '[0-9]+'])->name('dashboard.movie.edit_movie');
        Route::post('/edit_movie/{id?}', [MovieController::class, 'update_movie'])->where(['id' => '[0-9]+'])->name('dashboard.movie.update_movie');
        Route::post('/delete_movie', [MovieController::class, 'delete_movie'])->name('dashboard.movie.delete_movie');
        Route::get('/create_movie', [MovieController::class, 'create_movie'])->name('dashboard.movie.create_movie');
        Route::post('/create_movie', [MovieController::class, 'store_movie'])->name('dashboard.movie.store_movie');

        Route::get('/list_genre', [MovieController::class, 'list_genre'])->name('dashboard.movie.list_genre');
        Route::get('/create_genre', [MovieController::class, 'create_genre'])->name('dashboard.movie.create_genre');
        Route::post('/create_genre', [MovieController::class, 'store_genre'])->name('dashboard.movie.store_genre');
    });
    Route::prefix('provider')->group(function () {
        // Route::get('/add', [MovieController::class, 'create_movie'])->name('dashboard.movie.create_movie');
        // Route::post('/add', [MovieController::class, 'store_movie'])->name('dashboard.movie.store_movie');
        // Route::get('/create_genre', [MovieController::class, 'create_genre'])->name('dashboard.movie.create_genre');
        // Route::post('/create_genre', [MovieController::class, 'store_genre'])->name('dashboard.movie.store_genre');
    });
    Route::prefix('feedback')->group(function () {

        Route::POST('/add', [FeedbackController::class, 'add'])->name('dashboard.feedback.add'); //user add feedback
        Route::get('/feedback', [FeedbackController::class, 'showAll'])->name('dashboard.feedback.feedback');
        Route::get('/delete/{id?}', [FeedbackController::class, 'delete'])->where(['id' => '[0-9]+'])->name('dashboard.feedback.delete');
        Route::get('/edit/{id?}', [FeedbackController::class, 'editView'])->where(['id' => '[0-9]+'])->name('dashboard.feedback.editView');
        Route::post('/edit', [FeedbackController::class, 'edit'])->name('dashboard.feedback.edit');
    });
    Route::prefix('FAQ')->group(function () {

        Route::get('/viewUserFAQ', [FAQController::class, 'showAllUser']);
        Route::get('/viewAdminFAQ', [FAQController::class, 'showAllAdmin'])->name('dashboard.FAQ.viewAdminFAQ');
        Route::get('/createNewFAQ', function () {
            return view('dashboard.FAQ.add_frequently_asked_questions'); //view user
        });
        Route::post('/postFAQ', [FAQController::class, 'create_new']);
        Route::get('/destroyFAQ/{id}', [FAQController::class, 'destroy']);
        Route::get('/vieweditFAQ/{id}', [FAQController::class, 'viewUpdate']);
        Route::post('/editFAQ', [FAQController::class, 'update']);
    });


    Route::prefix('performance')->group(function () {

        Route::get('/user_performance', [DashboardController::class, 'user_performance'])->name('dashboard.performance.user_performance');
    });
});
