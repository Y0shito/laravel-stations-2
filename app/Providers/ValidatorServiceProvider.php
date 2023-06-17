<?php

namespace App\Providers;

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
            dd(request()->all());
            $request = request()->all();

            $pattern = '/^\d{4}\/\d{2}\/\d{2} \d{2}時\d{2}分$/';
            $startTime = "{$request['start_time_date']} {$request['start_time_time']}";
            $endTime = "{$request['end_time_date']} {$request['end_time_time']}";

            if (preg_match($pattern, $startTime) && preg_match($pattern, $endTime)) {
                $startTime = Carbon::createFromFormat('Y/m/d H時i分', $startTime);
                $endTime = Carbon::createFromFormat('Y/m/d H時i分', $endTime);
            } else {
                $startTime = Carbon::parse($startTime);
                $endTime = Carbon::parse($endTime);
            }

            if ($startTime->eq($endTime)) {
                return false;
            }

            return true;
        });

        Validator::extendImplicit('is_less_than_five_minutes', function () {
            $request = request()->all();

            $pattern = '/\d{2}時\d{2}分$/';
            $startTime = $request['start_time_time'];
            $endTime = $request['end_time_time'];

            if (preg_match($pattern, $startTime) && preg_match($pattern, $endTime)) {
                $startTime = Carbon::createFromFormat('H時i分', $startTime);
                $endTime = Carbon::createFromFormat('H時i分', $endTime);
            } else {
                $startTime = Carbon::parse($startTime);
                $endTime = Carbon::parse($endTime);
            }

            if ($startTime->diffInMinutes($endTime) <= 5) {
                return false;
            }

            return true;
        });

        Validator::extendImplicit('is_starttime_after_endtime', function () {
            $request = request()->all();

            $pattern = '/^\d{4}\/\d{2}\/\d{2} \d{2}時\d{2}分$/';
            $startTime = "{$request['start_time_date']} {$request['start_time_time']}";
            $endTime = "{$request['end_time_date']} {$request['end_time_time']}";

            if (preg_match($pattern, $startTime) && preg_match($pattern, $endTime)) {
                $startTime = Carbon::createFromFormat('Y/m/d H時i分', $startTime);
                $endTime = Carbon::createFromFormat('Y/m/d H時i分', $endTime);
            } else {
                $startTime = Carbon::parse($startTime);
                $endTime = Carbon::parse($endTime);
            }

            if ($startTime->greaterThan($endTime)) {
                return false;
            }

            return true;
        });
    }
}
