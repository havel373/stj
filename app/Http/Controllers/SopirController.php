<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SopirController extends Controller
{
    public function info() {
        $user = Auth::user();
        $driver = $user->driver;
        $schedule = Schedule::where('id_driver', $driver->id)->get();
        $new = $schedule->where('status', 0)->count();
        $reqUangJalan = $schedule->where('status', 1)->count();
        $ongoing = $schedule->where('status', 2)->count();
        $complete = $schedule->where('status', 3)->count();
        $cancel = $schedule->where('status', 4)->count();
        return view('pages.web.sopir.info.index', compact('user', 'driver', 'schedule', 'new', 'reqUangJalan', 'ongoing', 'complete', 'cancel'));
    }
}
