<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'movie_id', 'start_time', 'end_time'];
    protected $dates = ['start_time', 'end_time'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public static function scheduleDelete(int $scheduleId): void
    {
        DB::transaction(function () use ($scheduleId) {
            $schedule = self::find($scheduleId);

            if (is_null($schedule)) {
                abort(404);
            }

            $schedule->delete();
        });
    }
}
