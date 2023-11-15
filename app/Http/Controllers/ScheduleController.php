<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Driver;
use App\Models\RequestUangJalan;
use App\Models\Schedule;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $dataCustomer = Customer::get();
        if($request->ajax() ){
            $customer = $request->customer;
            $start_date = $request->start_date;
            $end_date = $request->end_date == null ? date('Y-m-d') : $request->end_date;
            if($request->start_date != null || $request->end_date != null){
                if($customer == ''){
                    $collection = Schedule::orderBy('created_at','desc')->whereBetween('tanggal',[$start_date,$end_date])->paginate(10);
                }
                if($customer != ''){
                    $collection = Schedule::orderBy('created_at','desc')->whereBetween('tanggal',[$start_date,$end_date])->where('id_customer', $customer)->paginate(10);
                }
            }else{
                if($customer == ''){
                    $collection = Schedule::orderBy('created_at','desc')->paginate(10);
                }
                if($customer != ''){
                    $collection = Schedule::orderBy('created_at','desc')->where('id_customer', $customer)->paginate(10);
                }
            }
            return view('pages.web.schedule.list', compact('collection'));
        }
        return view('pages.web.schedule.main', compact('dataCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::where('status_unit', 'free')
        ->get();
        $driver = Driver::whereNotIn('id', function ($query) {
            $query->select('id_driver')
                ->from('master_schedule')
                ->where(function ($query) {
                    $query->where('master_schedule.status', '=', '0')
                        ->orWhere('master_schedule.status', '=', '1')
                        ->orWhere('master_schedule.status', '=', '2');
                });
        })
        ->where('user_id', '!=', Auth::user()->id)
        ->get();
        $customer = Customer::get();
        return view('pages.web.schedule.input', ['data' => new Schedule, 'unit' => $unit, 'driver' => $driver, 'customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'id_unit' => 'required',
            'id_driver' => 'required',
            'id_customer' => 'required',
            'muat' => 'required',
            'bongkar' => 'required',
            'note' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('tanggal')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal'),
                ]);
            }else if ($errors->has('id_unit')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_unit'),
                ]);
            }else if ($errors->has('id_driver')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_driver'),
                ]);
            }else if ($errors->has('id_customer')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_customer'),
                ]);
            }else if ($errors->has('muat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('muat'),
                ]);
            }else if ($errors->has('bongkar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('bongkar'),
                ]);
            }else if ($errors->has('note')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('note'),
                ]);
            }else if ($errors->has('status')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status'),
                ]);
            }
        }
        $customer = Customer::where('id', $request->id_customer)->first();
        $data = [
            'tanggal' => $request->tanggal,
            'id_unit' => $request->id_unit,
            'id_driver' => $request->id_driver,
            'id_customer' => $request->id_customer,
            'muat' => $request->muat,
            'bongkar' => $request->bongkar,
            'note' => $request->note,
            'status' => $request->status,
            'no_spk' => 'SPK/'.strtoupper($customer->owner).'/'.date('d/m/Y').'-'
        ];
        $schedule = Schedule::create($data);
        $schedule->no_spk = $schedule->no_spk.$schedule->id;
        $schedule->update();
        $reqUJ = new RequestUangJalan;
        $reqUJ->id_schedule = $schedule->id;
        $reqUJ->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Schedule Disimpan',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $unit = Unit::get();
        $driver = Driver::get();
        $customer = Customer::get();
        return view('pages.web.schedule.input', ['data' => $schedule, 'unit' => $unit, 'driver' => $driver, 'customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'id_unit' => 'required',
            'id_driver' => 'required',
            'id_customer' => 'required',
            'muat' => 'required',
            'bongkar' => 'required',
            'note' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('tanggal')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tanggal'),
                ]);
            }else if ($errors->has('id_unit')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_unit'),
                ]);
            }else if ($errors->has('id_driver')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_driver'),
                ]);
            }else if ($errors->has('id_customer')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_customer'),
                ]);
            }else if ($errors->has('muat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('muat'),
                ]);
            }else if ($errors->has('bongkar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('bongkar'),
                ]);
            }else if ($errors->has('note')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('note'),
                ]);
            }else if ($errors->has('status')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status'),
                ]);
            }
        }

        $schedule->update($request->all());
        return response()->json([
            'alert' => 'success',
            'message' => 'Schedule Diubah',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Schedule Dihapus',
        ], 200);
    }
}
