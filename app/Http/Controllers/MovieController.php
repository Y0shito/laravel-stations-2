<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
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

            return redirect()->route('admin.movie', $movieId)->with('success', '登録が完了しました');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', '登録が失敗しました');
        }
    }

    public function showAdminMovieEdit(Movie $id)
    {
        return view('admin.movie.edit', ['movie' => $id]);
    }

    public function adminMovieUpdate(UpdateMovieRequest $request)
    {
        try {
            Movie::movieUpdate($request->only([
                'title',
                'image_url',
                'published_year',
                'is_showing',
                'description'
            ]), $request->id);

            return redirect()->route('admin.movie', $request->id)->with('success', '編集が完了しました');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', '編集が失敗しました');
        }
    }

    public function adminMovieDelete(Movie $id)
    {
        try {
            Movie::movieDelete($id->id);

            return redirect()->back()->with(['success' => "「{$id->title}」の削除が完了しました"]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['failed' => "「{$id->title}」の削除が失敗しました"]);
        }
    }
}
