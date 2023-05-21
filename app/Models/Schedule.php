<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'movie_id', 'start_time', 'end_time', 'created_at', 'updated_at'];
    protected $dates = ['start_time', 'end_time'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public static function scheduleStore(object $scheduleData)
    {
        DB::transaction(function () use ($scheduleData) {
            Schedule::insert(
                [
                    'movie_id' => $scheduleData->movie_id,
                    'start_time' => "{$scheduleData->start_time_date} {$scheduleData->start_time_time}",
                    'end_time' => "{$scheduleData->end_time_date} {$scheduleData->end_time_time}",
                ]
            );
        });
    }

    public static function scheduleUpdate(object $scheduleData, int $scheduleId): void
    {
        DB::transaction(function () use ($scheduleData, $scheduleId) {
            self::find($scheduleId)->update([
                'start_time' => "{$scheduleData->start_time_date} {$scheduleData->start_time_time}",
                'end_time' => "{$scheduleData->end_time_date} {$scheduleData->end_time_time}",
            ]);
        });
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
