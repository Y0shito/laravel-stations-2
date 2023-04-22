<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function showSheets()
    {
        $sheetChunks = Sheet::whereIn('row', ['a', 'b', 'c'])->get()->chunk(5);

        return view('sheets', compact('sheetChunks'));
    }
}
