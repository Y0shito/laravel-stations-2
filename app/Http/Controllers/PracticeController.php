<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practice;

class PracticeController extends Controller
{
    public function sample()
    {
        return view('practice');
    }

    public function sample2()
    {
        $test = 'practice2';
        return view('practice2', ['testParam' => $test]);
    }

    public function sample3()
    {
        return view('practice3', ['testParam' => 'test']);
    }

    public function getPractice()
    {
        $practice = Practice::all();
        return response()->json($practice);
    }
}