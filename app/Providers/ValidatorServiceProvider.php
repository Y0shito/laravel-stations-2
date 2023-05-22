<?php

namespace App\Providers;

use App\Models\Schedule;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extendImplicit('is_same_datetime', function () {
            $request = request()->all();

            $startTime = "{$request['start_time_date']} {$request['start_time_time']}";
            $endTime = "{$request['end_time_date']} {$request['end_time_time']}";

            if ($startTime === $endTime) {
                return false;
            }

            return true;
        });

        Validator::extendImplicit('is_less_than_five_minutes', function () {
            $request = request()->all();

            $startTime = Carbon::createFromFormat('H:i', $request['start_time_time']);
            $endTime = Carbon::createFromFormat('H:i', $request['end_time_time']);

            if ($startTime->diffInMinutes($endTime) <= 5) {
                return false;
            }

            return true;
        });
    }
}
