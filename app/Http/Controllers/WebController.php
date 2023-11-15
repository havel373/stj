<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Unit;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home() {
        $inprogress = Schedule::where('status','1')->orWhere('status','2')->count();
        $complete = Schedule::where('status','3')->count();
        $units = Schedule::whereIn('status',['1','2','3'])->get();
        $unit = Unit::count();
        $freeUnit = Unit::where('status_unit', 'free')->count();
        $usedUnit = Unit::where('status_unit', 'used')->count();
        return view('pages.web.main', compact('inprogress','complete','unit','freeUnit', 'usedUnit','units'));
    }
}
