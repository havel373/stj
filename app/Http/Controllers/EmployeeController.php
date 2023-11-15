<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax() ){
            $collection = User::orderBy('created_at','desc')->paginate(10);
            return view('pages.web.employee.list', compact('collection'));
        }
        return view('pages.web.employee.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.web.employee.input', ['data' => new User]);
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
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }else if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }else if ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }else if ($errors->has('role')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('role'),
                ]);
            }
        }

        $employee = new User;
        $employee->name = $request->name;
        $employee->username = $request->username;
        $employee->password = Hash::make($request->password);
        $employee->role = $request->role;
        if($request->np_hp){
            $employee->no_hp = $request->no_hp;
        }
        if(request()->file('foto')){
            $foto = request()->file('foto')->store('public/avatar_profile');
            $employee->foto = $foto;
        }
        $employee->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Karyawan Disimpan',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(User $employee)
    {
        return view('pages.web.employee.input', ['data' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }else if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }else if ($errors->has('role')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('role'),
                ]);
            }
        }

        $employee->name = $request->name;
        $employee->username = $request->username;
        $employee->role = $request->role;
        if($request->np_hp){
            $employee->no_hp = $request->no_hp;
        }
        if(request()->file('foto')){
            $foto = request()->file('foto')->store('public/avatar_profile');
            $employee->foto = $foto;
        }
        $employee->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Karyawan Diubah',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        try{
            $employee->delete();
            return response()->json([
                'alert' => 'success',
                'message' => 'Karyawan Dihapus',
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'alert' => 'error',
                'message' => 'Karyawan Tidak Dapat Dihapus Karena terdapat data yang berhubungan dengan karyawan ini',
            ]);
        }
    }
}
