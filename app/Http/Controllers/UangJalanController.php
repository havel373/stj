<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\RequestUangJalan;
use App\Models\Schedule;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UangJalanController extends Controller
{
    public function index(Request  $request) {
        if($request->ajax() ){
            $collection = Schedule::orderBy('created_at','desc')
            ->where('status', '=', '1')
            ->paginate(10);
            return view('pages.web.uangJalan.list', compact('collection'));
        }
        return view('pages.web.uangJalan.main');
    }

    public function edit(RequestUangJalan $uangJalan) {
        return view('pages.web.uangJalan.input', ['data' => $uangJalan]);
    }

    public function update(RequestUangJalan $uangJalan, Request $request) {
        $uangJalan->uang_jalan = Str::of($request->uang_jalan)->replace(',', '') ?: 0;
        $uangJalan->status = 'disetujui';
        $uangJalan->update();
        $schedule = Schedule::where('id', $uangJalan->id_schedule)->first();
        $schedule->status = '2';
        $schedule->update();
        $unit = Unit::where('id', $schedule->id_unit)->first();
        $unit->status_unit = 'used';
        $unit->update();
        $monitoring = new Monitoring;
        $monitoring->id_schedule = $schedule->id;
        $monitoring->master_status = 1;
        $monitoring->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data Disimpan',
        ], 201);
    }
}
