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
});
