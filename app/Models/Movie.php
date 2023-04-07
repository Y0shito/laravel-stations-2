<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image_url', 'published_year', 'is_showing', 'description', 'created_at', 'updated_at'];

    public static function movieCreate(array $movieData): int
    {
        return DB::transaction(function () use ($movieData) {
            $movieId = DB::table('movies')->insertGetId($movieData);
            return $movieId;
        });
    }

    //上記メソッドでは届いた値の中身が分からない、あるいは送信元を辿らないと分からない
    //実務では悪手か？
    //contからmodelは追えるが、modelからcontは追いづらい、ならmodelに詳細を書くべきか

    public static function movieUpdate(array $movieData, $movieId): void
    {
        DB::transaction(function () use ($movieData, $movieId) {
            self::find($movieId)->update($movieData);
        });
    }

    public static function movieDelete(int $movieId): void
    {
        DB::transaction(function () use ($movieId) {
            $movie = self::find($movieId);

            if (is_null($movie)) {
                abort(404);
            }

            $movie->delete();
        });
    }
}
