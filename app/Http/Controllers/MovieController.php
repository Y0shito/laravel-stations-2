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
        return view('admin.movies');
    }
}
