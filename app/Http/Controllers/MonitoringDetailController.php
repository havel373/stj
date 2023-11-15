<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Monitoring;
use App\Models\MonitoringDetail;
use App\Models\LaporanPerjalanan;
use App\Models\Schedule;
use App\Models\Unit;
use Illuminate\Http\Request;

class MonitoringDetailController extends Controller
{
   public function approve(Request $request, MonitoringDetail $monitoringDetail) {
        $monitoring = Monitoring::find($monitoringDetail->id_monitoring);
        if($monitoring->master_status < 5){
            $monitoring->master_status +=1;
        }
        if($monitoring->master_status == 5){
            $monitoring->done = 1;
            $schedule = Schedule::where('id', $monitoring->id_schedule)->first();
            $schedule->status = '3';
            $schedule->update();
            $laporanPerjalanan = new LaporanPerjalanan;
            $laporanPerjalanan->id_schedule = $monitoring->id_schedule;
            $laporanPerjalanan->save();
        }
        $monitoring->update();
        $monitoringDetail->status = 'diterima';
        $monitoringDetail->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Foto berhasil disetujui',
        ], 201);
    }

    public function reject(Request $request, MonitoringDetail $monitoringDetail) {
        $monitoringDetail->status = 'ditolak';
        if($request->reject != null){
            $monitoringDetail->catatan = $request->reject;
        }
        $monitoringDetail->update();
        $monitoring = Monitoring::where('id', $monitoringDetail->id_monitoring)->first();
        if($monitoringDetail->berangkat != null
        && $monitoringDetail->kirim_barang == null
        && $monitoringDetail->selesai == null
        && $monitoringDetail->done == null
        && $monitoringDetail->control == null){
            $monitoring->status_check = null;
            $monitoring->update();
        }

        if($monitoringDetail->berangkat != null
        && $monitoringDetail->kirim_barang != null
        && $monitoringDetail->selesai == null
        && $monitoringDetail->done == null
        && $monitoringDetail->control == null){
            $monitoring->status_check = 'berangkat';
            $monitoring->update();
        }

        if($monitoringDetail->berangkat != null
        && $monitoringDetail->kirim_barang != null
        && $monitoringDetail->selesai != null
        && $monitoringDetail->done == null
        && $monitoringDetail->control == null){
            $monitoring->status_check = 'kirim_barang';
            $monitoring->update();
        }

        if($monitoringDetail->berangkat != null
        && $monitoringDetail->kirim_barang != null
        && $monitoringDetail->selesai != null
        && $monitoringDetail->done != null
        && $monitoringDetail->control == null){
            $monitoring->status_check = 'selesai';
            $monitoring->update();
        }

        if($monitoringDetail->berangkat != null
        && $monitoringDetail->kirim_barang != null
        && $monitoringDetail->selesai != null
        && $monitoringDetail->done != null
        && $monitoringDetail->control != null
        && $monitoring->status_check == 'done'){
            $monitoring->status_check = 'selesai';
            $monitoring->update();
        }

        if($monitoringDetail->berangkat != null
        && $monitoringDetail->kirim_barang != null
        && $monitoringDetail->selesai != null
        && $monitoringDetail->done != null
        && $monitoringDetail->control != null
        && $monitoring->status_check == 'control'){
            $monitoring->status_check = 'done';
            $monitoring->update();
        }
        return response()->json([
            'alert' => 'success',
            'message' => 'Foto berhasil ditolak',
        ], 201);
    }
}
