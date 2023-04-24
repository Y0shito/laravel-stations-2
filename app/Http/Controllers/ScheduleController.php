<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
use App\Http\Requests\CreateScheduleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


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

    public function showAdminScheduleCreate(Movie $id)
    {
        return view('admin.schedule.create', ['movie' => $id]);
    }

    public function adminScheduleStore(CreateScheduleRequest $request)
    {
        try {
            Schedule::scheduleStore($request);

            return redirect()->route('admin.schedule', $request->movie_id)
                ->with(['success' => "スケジュールの新規登録が完了しました"]);
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['failed' => "スケジュールの新規登録が失敗しました"]);
        }
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
