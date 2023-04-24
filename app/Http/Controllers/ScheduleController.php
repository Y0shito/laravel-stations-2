<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
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

    public function showAdminScheduleCreate()
    {
        return view('admin.schedule.create');
    }

    public function adminScheduleDelete(Schedule $scheduleId)
    {
        try {
            Schedule::scheduleDelete($scheduleId->id);

            return redirect()->back()->with(['success' => "スケジュールID：{$scheduleId->id}の削除が完了しました"]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['failed' => "スケジュールID：{$scheduleId->id}の削除が失敗しました"]);
        }
    }
}
