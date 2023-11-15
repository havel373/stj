<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MonitoringJulitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Monitoring $monitoringJulitum)
    {
        return view('pages.web.monitoring.showAdmin2', ['monitoring' => $monitoringJulitum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitoring $monitoringJulitum)
    {
        return view('pages.web.monitoring.inputAdmin2', ['monitoring' => $monitoringJulitum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monitoring $monitoringJulitum)
    {
        $validator = Validator::make($request->all(), [
            'nomor_po' => 'required',
            'nomor_invoice' => 'required',
            'customer' => 'required',
            'rate' => 'required',
            'pilihan_rekening' => 'required',
            'jatuh_tempo' => 'required',
            'vat' => 'required',
            'grand_total' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nomor_po')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nomor_po'),
                ]);
            }else if ($errors->has('nomor_invoice')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nomor_invoice'),
                ]);
            }else if ($errors->has('customer')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('customer'),
                ]);
            }else if ($errors->has('rate')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('rate'),
                ]);
            }else if ($errors->has('pilihan_rekening')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('pilihan_rekening'),
                ]);
            }else if ($errors->has('jatuh_tempo')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jatuh_tempo'),
                ]);
            }else if ($errors->has('vat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('vat'),
                ]);
            }else if ($errors->has('grand_total')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('grand_total'),
                ]);
            }
        }
       $monitoringJulitum->nomor_invoice = $request->nomor_invoice;
       $monitoringJulitum->keterangan_invoice = $request->keterangan_invoice;
       $monitoringJulitum->nomor_po = $request->nomor_po;
       $monitoringJulitum->customer = $request->customer;
       $monitoringJulitum->rate = $request->rate;
       $monitoringJulitum->pilihan_rekening = $request->pilihan_rekening;
       $monitoringJulitum->jatuh_tempo = $request->jatuh_tempo;
       $monitoringJulitum->vat = $request->vat;
       $monitoringJulitum->grand_total = $request->grand_total;
       $monitoringJulitum->normal = $request->normal;
       $monitoringJulitum->multi_drop = $request->multi_drop;
       $monitoringJulitum->lain_lain = $request->lain_lain;
       $monitoringJulitum->total = $request->total;
       $monitoringJulitum->pph23 = $request->pph23;
       $monitoringJulitum->ppn = $request->ppn;
       $monitoringJulitum->nominal_invoice = $request->nominal_invoice;
       $monitoringJulitum->tanggal_tanda_terima_invoice = $request->tanggal_tanda_terima_invoice;
       $monitoringJulitum->keterangan = $request->keterangan;
       $monitoringJulitum->update();
       return response()->json([
        'alert' => 'success',
        'message' => 'Data berhasil di isi',
    ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitoring $monitoringJulitum)
    {
        //
    }
}
