<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'genre_id', 'image_url', 'published_year', 'is_showing', 'description', 'created_at', 'updated_at'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public static function movieCreate(object $movieData, int $genreId): int
    {
        $movieId = Movie::insertGetId(
            [
                'title' => $movieData->title,
                'genre_id' => $genreId,
                'image_url' => $movieData->image_url,
                'published_year' => $movieData->published_year,
                'is_showing' => $movieData->is_showing,
                'description' => $movieData->description
            ]
        );

        return $movieId;
    }

    public static function movieUpdate(object $movieData, int $genreId, int $movieId): void
    {
        self::find($movieId)->update([
            'title' => $movieData->title,
            'genre_id' => $genreId,
            'image_url' => $movieData->image_url,
            'published_year' => $movieData->published_year,
            'is_showing' => $movieData->is_showing,
            'description' => $movieData->description
        ]);
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
