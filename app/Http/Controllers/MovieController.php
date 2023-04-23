<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function showMovie(Movie $id)
    {
        return view('user.movie', ['movie' => $id]);
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
        DB::beginTransaction();

        try {
            //Genreへジャンル名を投げ、genres:idが返る
            $genreId = Genre::genreCreate($request->genre);

            //Movieへ値とgenreIdを投げ、例外無ければmovies:idが返る
            $movieId = Movie::movieCreate($request, $genreId);

            DB::commit();

            return redirect()->route('admin.movie', $movieId)->with('success', '登録が完了しました');
        } catch (\Exception $e) {
            DB::rollback();
            abort(500);
            // return redirect()->back()->with('failed', '登録が失敗しました');
        }
    }

    public function showAdminMovieEdit(Movie $id)
    {
        return view('admin.movie.edit', ['movie' => $id]);
    }

    public function adminMovieUpdate(UpdateMovieRequest $request, Movie $id)
    {
        DB::beginTransaction();

        try {
            //Genreへジャンル名を投げ、例外無ければgenres:idが返る
            $genreId = Genre::genreCreate($request->genre);

            //第1引数に更新する値、第2引数にgenreId、第3引数にmovie:id
            Movie::movieUpdate($request, $genreId, $id->id);

            DB::commit();

            return redirect()->route('admin.movie', $id->id)->with('success', '編集が完了しました');
        } catch (\Exception $e) {
            DB::rollback();
            abort(500);
            // return redirect()->back()->with('failed', '編集が失敗しました');
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
