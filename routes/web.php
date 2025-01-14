<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SheetController;

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
Route::get('/movies/{id}', [MovieController::class, 'showMovie'])->name('user.movie');

Route::prefix('/admin/movies')->group(function () {
    Route::get('/', [MovieController::class, 'showAdminMovies'])->name('admin.movies');
    Route::get('create', [MovieController::class, 'showAdminMovieCreate'])->name('admin.movie.create');
    Route::post('store', [MovieController::class, 'adminMovieStore'])->name('admin.movie.store');
    Route::get('{id}', [MovieController::class, 'showAdminMovie'])->name('admin.movie');
    Route::delete('{id}/destroy', [MovieController::class, 'AdminMovieDelete'])->name('admin.movie.delete');
    Route::get('{id}/edit', [MovieController::class, 'showAdminMovieEdit'])->name('admin.movie.edit');
    Route::patch('{id}/update', [MovieController::class, 'AdminMovieUpdate'])->name('admin.movie.update');

    Route::get('{id}/schedules/create', [ScheduleController::class, 'showAdminScheduleCreate'])->name('admin.schedule.create');
    Route::post('{id}/schedules/store', [ScheduleController::class, 'adminScheduleStore'])->name('admin.schedule.store');
});

Route::get('/sheets', [SheetController::class, 'showSheets'])->name('sheets');

Route::prefix('/admin/schedules')->group(function () {
    Route::get('/', [ScheduleController::class, 'showAdminSchedules'])->name('admin.schedules');
    Route::get('{movieId}', [ScheduleController::class, 'showAdminSchedule'])->name('admin.schedule');
    Route::patch('{scheduleId}/update', [ScheduleController::class, 'adminScheduleUpdate'])->name('admin.schedule.update');
    Route::delete('{scheduleId}/destroy', [ScheduleController::class, 'adminScheduleDelete'])->name('admin.schedule.delete');
    Route::get('{scheduleId}/edit', [ScheduleController::class, 'showAdminScheduleEdit'])->name('admin.schedule.edit');
});
