<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\MasterStatus;
use App\Models\MonitoringDetail;
use App\Models\MonitoringDetailAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MonitoringSopirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax() ){
            $status = MasterStatus::get();
            $collection = Monitoring::orderBy('created_at','desc')->paginate(10);
            return view('pages.web.sopir.monitoring.list', compact('collection','status'));
        }
        return view('pages.web.sopir.monitoring.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function show(Monitoring $monitoringSopir)
    {
        $monitoring = Monitoring::where('id', $monitoringSopir->id)
        ->first();
        return view('pages.web.sopir.monitoring.show', compact('monitoring'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitoring $monitoringSopir)
    {
        $monitoring = Monitoring::where('id', $monitoringSopir->id)
        ->first();
        return view('pages.web.sopir.monitoring.input', compact('monitoring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monitoring $monitoringSopir)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitoring $monitoringSopir)
    {
        //
    }


    public function berangkat($id) {
        $monitoringSopir = Monitoring::where('id', $id)
        ->first();
        $file = [];
        foreach (request()->file('berangkat') as $key => $value) {
           $file[] = $value->store("berangkat");
        }
        DB::beginTransaction();
        try {
            $monitoringDetail = new MonitoringDetail;
            $monitoringDetail->id_monitoring = $monitoringSopir->id;
            $monitoringDetail->status = 'menunggu';
            $monitoringDetail->master_status = $monitoringSopir->master_status;
            $monitoringDetail->save();
            foreach ($file as $isi) {
                MonitoringDetailAttachment::create([
                    'id_monitoring_detail' => $monitoringDetail->id,
                    'foto' => $isi,
                    'id_status' => $monitoringDetail->master_status,
                ]);
            }
            DB::commit();
            return response()->json([
                'alert' => 'success',
                'message' => 'Berhasil!',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'alert' => 'error',
                'message' => 'Error!',
            ], 400);
        }

    }
    
    public function kirim_barang($id) {
         $monitoringSopir = Monitoring::where('id', $id)
        ->first();
        $file = [];
        foreach (request()->file('kirim_barang') as $key => $value) {
           $file[] = $value->store("kirim_barang");
        }
        DB::beginTransaction();
        try {
            $monitoringDetail = new MonitoringDetail;
            $monitoringDetail->id_monitoring = $monitoringSopir->id;
            $monitoringDetail->status = 'menunggu';
            $monitoringDetail->master_status = $monitoringSopir->master_status;
            $monitoringDetail->save();
            foreach ($file as $isi) {
                MonitoringDetailAttachment::create([
                    'id_monitoring_detail' => $monitoringDetail->id,
                    'foto' => $isi,
                    'id_status' => $monitoringDetail->master_status,
                ]);
            }
            DB::commit();
            return response()->json([
                'alert' => 'success',
                'message' => 'Berhasil!',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'alert' => 'error',
                'message' => 'Error!',
            ], 400);
        }
    }
    
    public function selesai($id) {
        $monitoringSopir = Monitoring::where('id', $id)
        ->first();
        $file = [];
        foreach (request()->file('selesai') as $key => $value) {
           $file[] = $value->store("selesai");
        }
        DB::beginTransaction();
        try {
            $monitoringDetail = new MonitoringDetail;
            $monitoringDetail->id_monitoring = $monitoringSopir->id;
            $monitoringDetail->status = 'menunggu';
            $monitoringDetail->master_status = $monitoringSopir->master_status;
            $monitoringDetail->save();
            foreach ($file as $isi) {
                MonitoringDetailAttachment::create([
                    'id_monitoring_detail' => $monitoringDetail->id,
                    'foto' => $isi,
                    'id_status' => $monitoringDetail->master_status,
                ]);
            }
            DB::commit();
            return response()->json([
                'alert' => 'success',
                'message' => 'Berhasil!',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'alert' => 'error',
                'message' => 'Error!',
            ], 400);
        }
    }
    
    public function done($id) {
       $monitoringSopir = Monitoring::where('id', $id)
        ->first();
        $file = [];
        foreach (request()->file('done') as $key => $value) {
           $file[] = $value->store("done");
        }
        DB::beginTransaction();
        try {
            $monitoringDetail = new MonitoringDetail;
            $monitoringDetail->id_monitoring = $monitoringSopir->id;
            $monitoringDetail->status = 'menunggu';
            $monitoringDetail->master_status = $monitoringSopir->master_status;
            $monitoringDetail->save();
            foreach ($file as $isi) {
                MonitoringDetailAttachment::create([
                    'id_monitoring_detail' => $monitoringDetail->id,
                    'foto' => $isi,
                    'id_status' => $monitoringDetail->master_status,
                ]);
            }
            DB::commit();
            return response()->json([
                'alert' => 'success',
                'message' => 'Berhasil!',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'alert' => 'error',
                'message' => 'Error!',
            ], 400);
        }
    }
    
    public function control($id) {
         $monitoringSopir = Monitoring::where('id', $id)
        ->first();
        $file = [];
        foreach (request()->file('control') as $key => $value) {
           $file[] = $value->store("control");
        }
        DB::beginTransaction();
        try {
            $monitoringDetail = new MonitoringDetail;
            $monitoringDetail->id_monitoring = $monitoringSopir->id;
            $monitoringDetail->status = 'menunggu';
            $monitoringDetail->master_status = $monitoringSopir->master_status;
            $monitoringDetail->save();
            foreach ($file as $isi) {
                MonitoringDetailAttachment::create([
                    'id_monitoring_detail' => $monitoringDetail->id,
                    'foto' => $isi,
                    'id_status' => $monitoringDetail->master_status,
                ]);
            }
            DB::commit();
            return response()->json([
                'alert' => 'success',
                'message' => 'Berhasil!',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'alert' => 'error',
                'message' => 'Error!',
            ], 400);
        }
    }
}
