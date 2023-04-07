<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
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

    public function adminMovieStore(CreateMovieRequest $request)
    {
        try {
            $movieId = Movie::movieCreate($request->only([
                'title',
                'image_url',
                'published_year',
                'is_showing',
                'description'
            ]));

            return redirect()->route('admin.movie', ['id' => $movieId])->with('success', '登録が完了しました');
        } catch (\Exception $e) {
            return redirect()->route('admin.movies')->with('failed', '登録が失敗しました');
        }
    }

    public function showAdminMovieEdit(Movie $id)
    {
        return view('admin.movie.edit', ['movie' => $id]);
    }
}
