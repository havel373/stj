<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RequestUangJalan;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RequestUangJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataCustomer = Customer::get();
        if($request->ajax() ){
            $customer = $request->customer;
            $start_date = $request->start_date;
            $end_date = $request->end_date == null ? date('Y-m-d') : $request->end_date;
            if($request->start_date != null || $request->end_date != null){
                if (Auth::user()->role == 'z') {
                    if($customer == ''){
                        $collection = RequestUangJalan::select('master_request_uang_jalan.*', 'master_schedule.id_driver')
                        ->join('master_schedule', 'master_request_uang_jalan.id_schedule', '=', 'master_schedule.id')
                        ->whereBetween('tanggal',[$start_date,$end_date])
                        ->orderBy('master_request_uang_jalan.created_at', 'desc')
                        ->paginate(10);
                    }
                    if($customer != ''){
                        $collection = RequestUangJalan::select('master_request_uang_jalan.*', 'master_schedule.id_driver')
                        ->join('master_schedule', 'master_request_uang_jalan.id_schedule', '=', 'master_schedule.id')
                        ->whereBetween('tanggal',[$start_date,$end_date])
                        ->where('id_customer', $customer)
                        ->orderBy('master_request_uang_jalan.created_at', 'desc')
                        ->paginate(10);
                    }
                }else{
                    if($customer == ''){
                        $collection = RequestUangJalan::select('master_request_uang_jalan.*', 'master_schedule.id_driver')
                        ->join('master_schedule', 'master_request_uang_jalan.id_schedule', '=', 'master_schedule.id')
                        ->where('master_schedule.id_driver', Auth::user()->driver->id)
                        ->whereBetween('tanggal',[$start_date,$end_date])
                        ->orderBy('master_request_uang_jalan.created_at', 'desc')
                        ->paginate(10);
                    }
                    if($customer != ''){
                        $collection = RequestUangJalan::select('master_request_uang_jalan.*', 'master_schedule.id_driver')
                        ->join('master_schedule', 'master_request_uang_jalan.id_schedule', '=', 'master_schedule.id')
                        ->where('master_schedule.id_driver', Auth::user()->driver->id)
                        ->whereBetween('tanggal',[$start_date,$end_date])
                        ->where('id_customer', $customer)
                        ->orderBy('master_request_uang_jalan.created_at', 'desc')
                        ->paginate(10);
                    }
                }
            }else{
                if (Auth::user()->role == 'z') {
                    if($customer == ''){
                        $collection = RequestUangJalan::select('master_request_uang_jalan.*', 'master_schedule.id_driver')
                        ->join('master_schedule', 'master_request_uang_jalan.id_schedule', '=', 'master_schedule.id')
                        ->orderBy('master_request_uang_jalan.created_at', 'desc')
                        ->paginate(10);
                    }
                    if($customer != ''){
                        $collection = RequestUangJalan::select('master_request_uang_jalan.*', 'master_schedule.id_driver')
                        ->join('master_schedule', 'master_request_uang_jalan.id_schedule', '=', 'master_schedule.id')
                        ->where('id_customer', $customer)
                        ->orderBy('master_request_uang_jalan.created_at', 'desc')
                        ->paginate(10);
                    }
                }else{
                    if($customer == ''){
                        $collection = RequestUangJalan::select('master_request_uang_jalan.*', 'master_schedule.id_driver')
                        ->join('master_schedule', 'master_request_uang_jalan.id_schedule', '=', 'master_schedule.id')
                        ->where('master_schedule.id_driver', Auth::user()->driver->id)
                        ->orderBy('master_request_uang_jalan.created_at', 'desc')
                        ->paginate(10);
                    }
                    if($customer != ''){
                        $collection = RequestUangJalan::select('master_request_uang_jalan.*', 'master_schedule.id_driver')
                        ->join('master_schedule', 'master_request_uang_jalan.id_schedule', '=', 'master_schedule.id')
                        ->where('master_schedule.id_driver', Auth::user()->driver->id)
                        ->where('id_customer', $customer)
                        ->orderBy('master_request_uang_jalan.created_at', 'desc')
                        ->paginate(10);
                    }
                }
            }
            return view('pages.web.reqUJ.list', compact('collection'));
        }
        return view('pages.web.reqUJ.main', compact('dataCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedule = Schedule::get();
        return view('pages.web.reqUJ.input', ['data' => new RequestUangJalan, 'schedule' => $schedule]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'posisi_unit' => 'required',
        //     'lokasi_muat' => 'required',
        //     'tujuan' => 'required',
        //     'km_awal' => 'required',
        //     'km_akhir' => 'required',
        //     'uang_jalan' => 'required',
        //     'sisa_uang_jalan_kemarin' => 'required',
        //     'total_uang_jalan' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     $errors = $validator->errors();
        //    if ($errors->has('posisi_unit')) {
        //         return response()->json([
        //             'alert' => 'error',
        //             'message' => $errors->first('posisi_unit'),
        //         ]);
        //     }else if ($errors->has('lokasi_muat')) {
        //         return response()->json([
        //             'alert' => 'error',
        //             'message' => $errors->first('lokasi_muat'),
        //         ]);
        //     }else if ($errors->has('tujuan')) {
        //         return response()->json([
        //             'alert' => 'error',
        //             'message' => $errors->first('tujuan'),
        //         ]);
        //     }else if ($errors->has('km_awal')) {
        //         return response()->json([
        //             'alert' => 'error',
        //             'message' => $errors->first('km_awal'),
        //         ]);
        //     }else if ($errors->has('km_akhir')) {
        //         return response()->json([
        //             'alert' => 'error',
        //             'message' => $errors->first('km_akhir'),
        //         ]);
        //     }else if ($errors->has('uang_jalan')) {
        //         return response()->json([
        //             'alert' => 'error',
        //             'message' => $errors->first('uang_jalan'),
        //         ]);
        //     }else if ($errors->has('sisa_uang_jalan_kemarin')) {
        //         return response()->json([
        //             'alert' => 'error',
        //             'message' => $errors->first('sisa_uang_jalan_kemarin'),
        //         ]);
        //     }else if ($errors->has('total_uang_jalan')) {
        //         return response()->json([
        //             'alert' => 'error',
        //             'message' => $errors->first('total_uang_jalan'),
        //         ]);
        //     }
        // }

        RequestUangJalan::create($request->all());
        return response()->json([
            'alert' => 'success',
            'message' => 'Request Uang Jalan Disimpan',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestUangJalan  $requestUangJalan
     * @return \Illuminate\Http\Response
     */
    public function show(RequestUangJalan $reqUJ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestUangJalan  $requestUangJalan
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestUangJalan $reqUJ)
    {
        $schedule = Schedule::get();
        return view('pages.web.reqUJ.input', ['data' => $reqUJ, 'schedule' => $schedule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestUangJalan  $requestUangJalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestUangJalan $reqUJ)
    {
        if($reqUJ->posisi_unit == null){
            $validator = Validator::make($request->all(), [
                'posisi_unit' => 'required',
                'lokasi_muat' => 'required',
                'tujuan' => 'required',
                'km_awal' => 'required',
                // 'km_akhir' => 'required',
                'uang_jalan' => 'required',
                'sisa_uang_jalan_kemarin' => 'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
               if ($errors->has('posisi_unit')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('posisi_unit'),
                    ]);
                }else if ($errors->has('lokasi_muat')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('lokasi_muat'),
                    ]);
                }else if ($errors->has('tujuan')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('tujuan'),
                    ]);
                }else if ($errors->has('km_awal')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('km_awal'),
                    ]);
                }else if ($errors->has('uang_jalan')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('uang_jalan'),
                    ]);
                }else if ($errors->has('sisa_uang_jalan_kemarin')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('sisa_uang_jalan_kemarin'),
                    ]);
                }
            }
            $schedule = Schedule::where('id', $reqUJ->id_schedule)->first();
            $schedule->status = $request->status;
            $schedule->update();
            $foto_km_awal = null;
            $balok_bensin_awal = null;
            if(request()->file('balok_bensin_awal')){
                $balok_bensin_awal = request()->file('balok_bensin_awal')->store("balok_bensin_awal");
            }
            if(request()->file('foto_km_awal')){
                $foto_km_awal = request()->file('foto_km_awal')->store("foto_km_awal");
            }
            $reqUJ->posisi_unit = $request->posisi_unit;
            $reqUJ->lokasi_muat = $request->lokasi_muat;
            $reqUJ->tujuan = $request->tujuan;
            $reqUJ->km_awal = $request->km_awal;
            $reqUJ->km_akhir = $request->km_akhir;
            $reqUJ->uang_jalan = Str::of($request->uang_jalan)->replace(',', '') ?: 0;
            $reqUJ->sisa_uang_jalan_kemarin = Str::of($request->sisa_uang_jalan_kemarin)->replace(',', '') ?: 0;
            $reqUJ->total_uang_jalan = Str::of($request->total_uang_jalan)->replace(',', '') ?: 0;
            $reqUJ->balok_bensin_awal = $balok_bensin_awal == null ? null : $balok_bensin_awal;
            $reqUJ->foto_km_awal = $foto_km_awal == null ? null :$foto_km_awal ;
        }else{
            // $validator = Validator::make($request->all(), [
            //     'km_akhir' => 'required',
            // ]);
            // if ($validator->fails()) {
            //     $errors = $validator->errors();
            //     if ($errors->has('km_akhir')) {
            //         return response()->json([
            //             'alert' => 'error',
            //             'message' => $errors->first('km_akhir'),
            //         ]);
            //     }
            // }
            $reqUJ->km_akhir = $request->km_akhir == null ? null : $request->km_akhir ;
        }
       
        $reqUJ->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Request Uang Jalan Diubah',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestUangJalan  $requestUangJalan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestUangJalan $reqUJ)
    {
        $reqUJ->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Request Uang Jalan Dihapus',
        ], 200);
    }
}
