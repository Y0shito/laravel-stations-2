<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('user.movies', compact('movies'));
    }

    public function showAdminMovies()
    {
        $movies = Movie::all();
        return view('admin.movies', compact('movies'));
    }

    public function showAdminMovie(Movie $id)
    {
        return view('admin.movie', ['movie' => $id]);
    }

    public function showAdminMovieCreate()
    {
        return view('admin.movie.create');
    }
}
