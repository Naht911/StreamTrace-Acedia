<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MovieController;
use App\Http\Controllers\Dashboard\StreamingProviderController;
use App\Http\Controllers\Home\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\RatingController;
use App\Http\Controllers\Home\ReactionController;
use App\Models\StreamingServiceProvider;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/wathchlist', [HomeController::class, 'wathchlist'])
    ->middleware(['auth'])
    ->name('home.wathchlist');
Route::prefix('movie')->group(function () {

    Route::get('/{id}', [HomeController::class, 'movie_detail'])->name('home.movie.movie_detail');
    Route::get('/c/{id}', [HomeController::class, 'movie_detail_copy'])->name('home.movie.movie_detail_copy');
    Route::post('/get_reaction', [ReactionController::class, 'get_reaction'])->name('home.movie.get_reaction');
    Route::post('/handle_reaction', [ReactionController::class, 'handle_reaction'])->name('home.movie.handle_reaction');
    Route::post('/handle_rating', [RatingController::class, 'handle_rating'])->name('home.movie.handle_rating');
});

Route::get('/go/{movie_id}', [HomeController::class, 'outsite'])->where(['movie_id' => '[0-9]+'])->name('home.outsite');


Route::get('/feedback', [FeedbackController::class, 'feedback'])->name('feedback'); //user view feedback
Route::post('/create_feedback', [FeedbackController::class, 'create_feedback'])->name('create_feedback'); //user add feedback

Route::get('/FAQ', [FAQController::class, 'FAQ'])->name('FAQ');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');

Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgotPassword');
Route::post('/forgot-password', [AuthController::class, 'processForgotPassword'])->name('forgotPassword.process');

Route::get('/reset-password/{user}/{token}', [AuthController::class, 'showResetPasswordForm'])->name('resetPassword');
Route::post('/reset-password/{user}/{token}', [AuthController::class, 'processResetPassword'])->name('resetPassword.process');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'processRegistration'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('dashboard')
    ->middleware([
        'auth',
        // config('jetstream.auth_session'),
        // 'verified',
        // 'role:admin|editor|appraiser|seller|user',
    ])
    ->group(function () {
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
            Route::get('/edit_genre/{id?}', [MovieController::class, 'edit_genre'])->where(['id' => '[0-9]+'])->name('dashboard.movie.edit_genre');
            Route::post('/edit_genre/{id?}', [MovieController::class, 'update_genre'])->where(['id' => '[0-9]+'])->name('dashboard.movie.update_genre');
            Route::post('/delete_genre', [MovieController::class, 'delete_genre'])->name('dashboard.movie.delete_genre');

            Route::get('/show_movie_provider/{id}', [MovieController::class, 'show_movie_provider'])->where(['id' => '[0-9]+'])->name('dashboard.movie.show_movie_provider');
            Route::get('/add_movie_provider/{id}', [MovieController::class, 'add_movie_provider'])->where(['id' => '[0-9]+'])->name('dashboard.movie.add_movie_provider');
            Route::post('/add_movie_provider/{id}', [MovieController::class, 'store_movie_provider'])->where(['id' => '[0-9]+'])->name('dashboard.movie.store_movie_provider');
            Route::get('/edit_movie_provider/{movie_id}/{id}', [MovieController::class, 'edit_movie_provider'])->where(['movie_id' => '[0-9]+', 'id' => '[0-9]+'])->name('dashboard.movie.edit_movie_provider');
            Route::post('/edit_movie_provider/{movie_id}/{id}', [MovieController::class, 'update_movie_provider'])->where(['movie_id' => '[0-9]+', 'id' => '[0-9]+'])->name('dashboard.movie.update_movie_provider');

            Route::post('/delete_movie_provider', [MovieController::class, 'delete_movie_provider'])->name('dashboard.movie.delete_movie_provider');
        });
        Route::prefix('provider')->group(function () {
            Route::get('/', [StreamingProviderController::class, 'list_provider'])->name('dashboard.provider.list_provider');
            Route::get('/create_provider', [StreamingProviderController::class, 'create_provider'])->name('dashboard.provider.create_provider');
            Route::post('/create_provider', [StreamingProviderController::class, 'store_provider'])->name('dashboard.provider.store_provider');
            Route::get('/edit_provider/{id?}', [StreamingProviderController::class, 'edit_provider'])->where(['id' => '[0-9]+'])->name('dashboard.provider.edit_provider');
            Route::post('/edit_provider/{id?}', [StreamingProviderController::class, 'update_provider'])->where(['id' => '[0-9]+'])->name('dashboard.provider.update_provider');
            Route::post('/delete_provider', [StreamingProviderController::class, 'delete_provider'])->name('dashboard.provider.delete_provider');
        });
        Route::prefix('feedback')->group(function () {
            Route::get('/{status?}', [FeedbackController::class, 'list_feedback'])->name('dashboard.feedback');
            Route::get('/edit_feedback/{id?}', [FeedbackController::class, 'edit_feedback'])->where(['id' => '[0-9]+'])->name('dashboard.feedback.edit_feedback');
            Route::post('/edit_feedback/{id?}', [FeedbackController::class, 'update_feedback'])->name('dashboard.feedback.update_feedback');
            Route::get('/delete_feedback/{id?}', [FeedbackController::class, 'delete_feedback'])->where(['id' => '[0-9]+'])->name('dashboard.feedback.delete_feedback');
            Route::get('/complete_processing/{id?}', [FeedbackController::class, 'complete_processing'])->name('dashboard.feedback.complete_processing');
        });
        Route::prefix('FAQ')->group(function () {
            Route::get('/', [FAQController::class, 'control_FAQ'])->name('dashboard.FAQ');
            Route::get('/create_FAQ', [FAQController::class, 'create'])->name('dashboard.FAQ.create_FAQ');
            Route::post('/create_FAQ', [FAQController::class, 'create_FAQ'])->name('dashboard.FAQ.create_FAQ');
            Route::get('/edit_FAQ/{id?}', [FAQController::class, 'edit_FAQ'])->name('dashboard.FAQ.edit_FAQ');
            Route::post('/edit_FAQ/{id?}', [FAQController::class, 'update_FAQ'])->name('dashboard.FAQ.update_FAQ');
            Route::get('/delete_FAQ/{id?}', [FAQController::class, 'delete_FAQ'])->name('dashboard.FAQ.delete_FAQ');
        });


        Route::prefix('performance')->group(function () {

            Route::get('/user_performance', [DashboardController::class, 'user_performance'])->name('dashboard.performance.user_performance');
        });
    });
