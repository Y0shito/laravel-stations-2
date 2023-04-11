<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        // 検索語句無し、かつ「すべて」にチェック時は全ての映画を出力
        if (empty($keyword) && is_null($request->is_showing)) {
            $movies = Movie::paginate(20);
            return view('user.movies', compact('movies'));
        }

        $foundMovies = Movie::query();

        //検索語句があれば、タイトル及び概要から語句をLIKE検索
        if (!empty($keyword)) {
            $foundMovies->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%$keyword%")
                    ->orWhere('description', 'like', "%$keyword%");
            });
        }

        //「上映中」「上映予定」いずれかにチェックあれば、公開状況からも検索
        if (!is_null($request->is_showing)) {
            $foundMovies->where('is_showing', $request->is_showing);
        }

        return view('user.movies', ['movies' => $foundMovies->paginate(20)]);
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
