<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/practice', [PracticeController::class, 'sample']);
// Route::get('/practice2', [PracticeController::class, 'sample2']);
// Route::get('/practice3', [PracticeController::class, 'sample3']);

// Route::get('/getPractice', [PracticeController::class, 'getPractice']);

Route::get('/movies', [MovieController::class, 'index'])->name('movies');

Route::prefix('/admin/movies')->group(function () {
    Route::get('/', [MovieController::class, 'showAdminMovies'])->name('admin.movies');
    Route::get('create', [MovieController::class, 'showAdminMovieCreate'])->name('admin.movie.create');
    Route::post('store', [MovieController::class, 'adminMovieStore'])->name('admin.movie.store');
    Route::get('{id}', [MovieController::class, 'showAdminMovie'])->name('admin.movie');
    Route::delete('{id}/destroy', [MovieController::class, 'AdminMovieDelete'])->name('admin.movie.delete');
    Route::get('{id}/edit', [MovieController::class, 'showAdminMovieEdit'])->name('admin.movie.edit');
    Route::patch('{id}/update', [MovieController::class, 'AdminMovieUpdate'])->name('admin.movie.update');
});

//映画新規作成のURLがadmin/movies/createとsがつくのに対し、nameはadmin.movie.createとしている（作れるのは1個なので）
//sを統一すべきか？
