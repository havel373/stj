<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Owner;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax() ){
            $status_unit = $request->status_unit;
            if($status_unit == ''){
                $collection = Unit::orderBy('created_at','desc')->paginate(10);
            }
            if($status_unit != ''){
                $collection = Unit::orderBy('created_at','desc')->where('status_unit', $status_unit)->paginate(10);
            }
            return view('pages.web.unit.list', compact('collection'));
        }
        return view('pages.web.unit.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driver = Driver::get();
        $owner = Owner::get();
        return view('pages.web.unit.input', ['data' => new Unit, 'driver' => $driver, 'owner' => $owner]);
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
            'no_pol' => 'required',
            'type_unit' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('no_pol')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_pol'),
                ]);
            }else if ($errors->has('type_unit')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('type_unit'),
                ]);
            }else if ($errors->has('no_rangka')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_rangka'),
                ]);
            }else if ($errors->has('no_mesin')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_mesin'),
                ]);
            }
        }
        
        Unit::create($request->all());
        return response()->json([
            'alert' => 'success',
            'message' => 'Unit Disimpan',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $driver = Driver::get();
        $owner = Owner::get();
        return view('pages.web.unit.input', ['data' => $unit, 'driver' => $driver, 'owner' => $owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $validator = Validator::make($request->all(), [
            'no_pol' => 'required',
            'type_unit' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
        ]);

        $validator = Validator::make($request->all(), [
            'no_pol' => 'required',
            'type_unit' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('no_pol')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_pol'),
                ]);
            }else if ($errors->has('type_unit')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('type_unit'),
                ]);
            }else if ($errors->has('no_rangka')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_rangka'),
                ]);
            }else if ($errors->has('no_mesin')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_mesin'),
                ]);
            }
        }

        $unit->update($request->all());
        return response()->json([
            'alert' => 'success',
            'message' => 'Unit Diubah',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Unit Dihapus',
        ], 200);
    }
    
}
