<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function showAdminSchedules()
    {
        $movies = Movie::with(['schedules' => function ($query) {
            $query->orderBy('start_time', 'asc');
        }])->get();

        return view('admin.schedule.schedules', compact('movies'));
    }

    public function showAdminSchedule($movieId)
    {
        $movie = Movie::with(['schedules' => function ($query) {
            $query->orderBy('start_time', 'asc');
        }])->whereId($movieId)->first();

        return view('admin.schedule.schedule', compact('movie'));
    }
}
