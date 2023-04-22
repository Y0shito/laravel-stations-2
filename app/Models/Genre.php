<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public static function genreCreate(string $genreName): int
    {
        $genre = self::firstOrCreate(['name' => $genreName]);
        return $genre->id;
    }
}
