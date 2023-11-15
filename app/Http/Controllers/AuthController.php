<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    function __construct() {
        $this->middleware('guest')->except('logout','profileEdit','updateProfile');
    }

    public function login() {
        return view('pages.auth.main');
    }

    public function do_login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }else if ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        
        $check = User::where("username", $request->username)->first();
        $user = $request->all();
        if ($check) {
            if (Auth::attempt($user)) {
                if (Auth::user()->role == 's') {
                    $redirect = route('sopir.info');
                }else{
                    $redirect = route('home');
                }
                return response()->json([
                    'alert' => 'success',
                    'message' => 'Selamat Datang Kembali ' . Auth::user()->name,
                    'redirect' => $redirect,
                ]);
            }
            else {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Password salah!',
                ]);
            }
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Username tidak ditemukan!',
            ]);
        }
    }

    public function profileEdit() {
        return view('pages.auth.profile');
    }

    public function updateProfile(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'username' =>'required',
            'currentpassword' => 'required_with:newpassword|different:newpassword',
            'newpassword' => 'required_with:confirmpassword|same:confirmpassword',
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
            }else if ($errors->has('currentpassword')) {
                return response()->json([
                    'alert' => 'error',
                   'message' => $errors->first('currentpassword'),
                ]);
            }else if ($errors->has('newpassword')) {
                return response()->json([
                    'alert' => 'error',
                   'message' => $errors->first('newpassword'),
                ]);
            }else if ($errors->has('confirmpassword')) {
                return response()->json([
                    'alert' => 'error',
                   'message' => $errors->first('confirmpassword'),
                ]);
            }
        }

        $user = User::find(Auth::user()->id);
        if($request->newpassword){
            if(Hash::check($request->currentpassword , auth()->user()->password)){
                if(!Hash::check($request->new_password , auth()->user()->password)) {
                    $user->password = Hash::make($request->newpassword);
                }else{
                    return response()->json([
                        'alert' => 'error',
                        'message' => 'Password lama tidak sesuai!',
                    ]);
                }
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Password lama tidak boleh sama dengan password baru!',
                ]);
            }
        }
        $user->name = $request->name;
        $user->username = $request->username;
        if($request->nomor_hp){
            $user->no_hp = $request->nomor_hp;
        }

        if(request()->file('foto')){
            $foto = request()->file('foto')->store("avatar_profile");
            $user->foto = $foto;
        }
        $user->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Profile berhasil diubah',
            'redirect' => route('profile.edit'),
        ]);
    }

    public function logout() {
        Auth::logout();
        return view('pages.auth.main');
    } 
}
