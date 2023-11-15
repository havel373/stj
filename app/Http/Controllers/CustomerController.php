<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        if($request->ajax() ){
            $owner = $request->owner;
            if($owner == ''){
                $collection = Customer::orderBy('created_at','desc')->paginate(10);
            }
            if($owner != ''){
                $collection = Customer::orderBy('created_at','desc')->where('owner', $owner)->paginate(10);
            }
            return view('pages.web.customer.list', compact('collection'));
        }
        return view('pages.web.customer.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.web.customer.input', ['data' => new Customer]);
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
            'nama_customer' => 'required',
            'address' => 'required',
            'pic' => 'required',
            'email' => 'required',
            'owner' => 'required',
            'no_hp_pic' => 'required',
            'tipe' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_customer')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_customer'),
                ]);
            }else if ($errors->has('address')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('address'),
                ]);
            }else if ($errors->has('pic')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('pic'),
                ]);
            }else if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else if ($errors->has('owner')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('owner'),
                ]);
            }else if ($errors->has('no_hp_pic')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_hp_pic'),
                ]);
            }else if ($errors->has('tipe')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tipe'),
                ]);
            }
        }

        Customer::create($request->all());
        return response()->json([
            'alert' => 'success',
            'message' => 'Customer Disimpan',
        ], 201);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('pages.web.customer.input', ['data' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'nama_customer' => 'required',
            'address' => 'required',
            'pic' => 'required',
            'email' => 'required',
            'owner' => 'required',
            'no_hp_pic' => 'required',
            'tipe' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_customer')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_customer'),
                ]);
            }else if ($errors->has('address')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('address'),
                ]);
            }else if ($errors->has('pic')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('pic'),
                ]);
            }else if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else if ($errors->has('owner')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('owner'),
                ]);
            }else if ($errors->has('no_hp_pic')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('no_hp_pic'),
                ]);
            }else if ($errors->has('tipe')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tipe'),
                ]);
            }
        }

        $customer->update($request->all());
        return response()->json([
            'alert' => 'success',
            'message' => 'Customer Diubah',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Customer Dihapus',
        ], 200);
    }
}
