<?php

namespace App\Providers;

use App\Models\Schedule;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
    }
}
