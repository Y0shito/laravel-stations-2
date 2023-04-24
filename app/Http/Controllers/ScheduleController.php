<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function showAdminSchedules ()
    {
        return view('admin.schedule.schedules');
    }
}
