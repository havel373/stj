<?php

namespace App\Http\Controllers;

use App\Exports\MonitoringInvoiceExport;
use App\Models\Monitoring;
use App\Models\MasterStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringController extends Controller
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
            return view('pages.web.monitoring.list', compact('collection','status'));
        }
        return view('pages.web.monitoring.main');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monitoring = Monitoring::where('id', $id)
        ->first();
        $status = MasterStatus::get();
        return view('pages.web.monitoring.show', compact('monitoring','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monitoring = Monitoring::where('id', $id)
        ->first();
        return view('pages.web.monitoring.input', compact('monitoring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $monitoring = Monitoring::where('id', $id)
        ->first();
        $validator = Validator::make($request->all(), [
            'nomor_do' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nomor_do')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nomor_do'),
                ]);
            }
        }

        $monitoring->nomor_do = $request->nomor_do;
        $monitoring->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Nomor DO berhasil di isi',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function berangkat($id) {
        $monitoring = Monitoring::where('id', $id)
        ->first();
        $monitoring->berangkat = request('value');
        $monitoring->update();
    }

    public function kirim_barang($id) {
        $monitoring = Monitoring::where('id', $id)
        ->first();
        $monitoring->berangkat = 1;
        $monitoring->kirim_barang = request('value');
        $monitoring->update();
    }

    public function selesai($id) {
        $monitoring = Monitoring::where('id', $id)
        ->first();
        $monitoring->berangkat = 1;
        $monitoring->kirim_barang = 1;
        $monitoring->selesai = request('value');
        $monitoring->update();
    }

    public function done($id) {
        $monitoring = Monitoring::where('id', $id)
        ->first();
        $monitoring->berangkat = 1;
        $monitoring->kirim_barang = 1;
        $monitoring->selesai = 1;
        $monitoring->done = request('value');
        $monitoring->update();
    }

    public function control($id) {
        $monitoring = Monitoring::where('id', $id)
        ->first();
        $monitoring->berangkat = 1;
        $monitoring->kirim_barang = 1;
        $monitoring->selesai = 1;
        $monitoring->done = 1;
        $monitoring->control = request('value');
        $monitoring->update();
    }

    public function generateExcel($id)
    {
        return Excel::download(new MonitoringInvoiceExport($id), 'invoice.xlsx');
    }
}
