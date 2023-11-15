<?php

namespace App\Http\Controllers;

use App\Models\LaporanPerjalanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LaporanPerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax() ){
            if (Auth::user()->role == 'z') {
                $collection = LaporanPerjalanan::select('laporan_perjalanan.*','master_schedule.id_driver')
                ->join('master_schedule', 'laporan_perjalanan.id_schedule', '=', 'master_schedule.id')
                ->orderBy('created_at','desc')
                ->paginate(10);
            }else{
                $collection = LaporanPerjalanan::select('laporan_perjalanan.*','master_schedule.id_driver')
                ->join('master_schedule', 'laporan_perjalanan.id_schedule', '=', 'master_schedule.id')
                ->where('master_schedule.id_driver',Auth::user()->driver->id)
                ->orderBy('created_at','desc')
                ->paginate(10);
            }
            return view('pages.web.laporanPerjalanan.list', compact('collection'));
        }
        return view('pages.web.laporanPerjalanan.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.web.laporanPerjalanan.input', ['data' => new LaporanPerjalanan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLaporanPerjalananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receh_di_jalan' => 'required',
            'parkir_resmi' => 'required',
            'parkir_liar' => 'required',
            'helper' => 'required',
            'tkbm_muat' => 'required',
            'tkbm_bongkar' => 'required',
            'cheker' => 'required',
            'forklift' => 'required',
            'security' => 'required',
            'bbm' => 'required',
            'etoll' => 'required',
            'total_pengeluaran' => 'required',
            'sisa_uang_jalan' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('receh_di_jalan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('receh_di_jalan'),
                ]);
            }else if ($errors->has('parkir_resmi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('parkir_resmi'),
                ]);
            }else if ($errors->has('parkir_liar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('parkir_liar'),
                ]);
            }else if ($errors->has('helper')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('helper'),
                ]);
            }else if ($errors->has('tkbm_muat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tkbm_muat'),
                ]);
            }else if ($errors->has('tkbm_bongkar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tkbm_bongkar'),
                ]);
            }else if ($errors->has('cheker')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cheker'),
                ]);
            }else if ($errors->has('forklift')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('forklift'),
                ]);
            }else if ($errors->has('security')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('security'),
                ]);
            }else if ($errors->has('bbm')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('bbm'),
                ]);
            }else if ($errors->has('etoll')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('etoll'),
                ]);
            }else if ($errors->has('total_pengeluaran')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('total_pengeluaran'),
                ]);
            }else if ($errors->has('sisa_uang_jalan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('sisa_uang_jalan'),
                ]);
            }
        }

        LaporanPerjalanan::create($request->all());
        return response()->json([
            'alert' => 'success',
            'message' => 'Laporan Perjalanan Disimpan',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanPerjalanan  $laporanPerjalanan
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanPerjalanan $laporanPerjalanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanPerjalanan  $laporanPerjalanan
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanPerjalanan $laporanPerjalanan)
    {
        return view('pages.web.laporanPerjalanan.input', ['data' => $laporanPerjalanan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaporanPerjalananRequest  $request
     * @param  \App\Models\LaporanPerjalanan  $laporanPerjalanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanPerjalanan $laporanPerjalanan)
    {
        $validator = Validator::make($request->all(), [
            'receh_di_jalan' => 'required',
            'parkir_resmi' => 'required',
            'parkir_liar' => 'required',
            'helper' => 'required',
            'tkbm_muat' => 'required',
            'tkbm_bongkar' => 'required',
            'cheker' => 'required',
            'forklift' => 'required',
            'security' => 'required',
            'bbm' => 'required',
            'etoll' => 'required',
            'total_pengeluaran' => 'required',
            'sisa_uang_jalan' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('receh_di_jalan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('receh_di_jalan'),
                ]);
            }else if ($errors->has('parkir_resmi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('parkir_resmi'),
                ]);
            }else if ($errors->has('parkir_liar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('parkir_liar'),
                ]);
            }else if ($errors->has('helper')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('helper'),
                ]);
            }else if ($errors->has('tkbm_muat')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tkbm_muat'),
                ]);
            }else if ($errors->has('tkbm_bongkar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tkbm_bongkar'),
                ]);
            }else if ($errors->has('cheker')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cheker'),
                ]);
            }else if ($errors->has('forklift')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('forklift'),
                ]);
            }else if ($errors->has('security')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('security'),
                ]);
            }else if ($errors->has('bbm')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('bbm'),
                ]);
            }else if ($errors->has('etoll')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('etoll'),
                ]);
            }else if ($errors->has('total_pengeluaran')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('total_pengeluaran'),
                ]);
            }else if ($errors->has('sisa_uang_jalan')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('sisa_uang_jalan'),
                ]);
            }
        }
        if (request()->file('receh_di_jalan')) {
            $file_receh_di_jalan = request()->file('receh_di_jalan')->store('laporanPerjalanan/receh_di_jalan');
            $laporanPerjalanan->receh_di_jalan = $file_receh_di_jalan;
        }
        if (request()->file('parkir_resmi')) {
            $file_parkir_resmi = request()->file('parkir_resmi')->store('laporanPerjalanan/parkir_resmi');
            $laporanPerjalanan->foto_parkir_resmi = $file_parkir_resmi;
        }
        if (request()->file('parkir_liar')) {
            $file_parkir_liar = request()->file('parkir_liar')->store('laporanPerjalanan/parkir_liar');
            $laporanPerjalanan->foto_parkir_liar = $file_parkir_liar;
        }
        if (request()->file('helper')) {
            $file_helper = request()->file('helper')->store('laporanPerjalanan/helper');
            $laporanPerjalanan->foto_helper =  $file_helper;
        }
        if (request()->file('tkbm_muat')) {
            $file_tkbm_muat = request()->file('tkbm_muat')->store('laporanPerjalanan/tkbm_muat');
            $laporanPerjalanan->foto_tkbm_muat =  $file_tkbm_muat;
        }
        if (request()->file('tkbm_bongkar')) {
            $file_tkbm_bongkar = request()->file('tkbm_bongkar')->store('laporanPerjalanan/tkbm_bongkar');
            $laporanPerjalanan->foto_tkbm_bongkar =  $file_tkbm_bongkar;
        }
        if (request()->file('forklift')) {
            $file_forklift = request()->file('forklift')->store('laporanPerjalanan/forklift');
            $laporanPerjalanan->foto_forklift =  $file_forklift;
        }
        if (request()->file('security')) {
            $file_security = request()->file('security')->store('laporanPerjalanan/security');
            $laporanPerjalanan->foto_security =  $file_security;
        }
        if (request()->file('bbm')) {
            $file_bbm = request()->file('bbm')->store('laporanPerjalanan/bbm');
            $laporanPerjalanan->foto_bbm =  $file_bbm;
        }
        if (request()->file('etoll')) {
            $file_etoll = request()->file('etoll')->store('laporanPerjalanan/etoll');
            $laporanPerjalanan->foto_etoll =  $file_etoll;
        }

        $laporanPerjalanan->receh_di_jalan = Str::of($request->receh_di_jalan)->replace(',', '') ?: 0;
        $laporanPerjalanan->parkir_resmi = Str::of($request->parkir_resmi)->replace(',', '') ?: 0;
        $laporanPerjalanan->parkir_liar = Str::of($request->parkir_liar)->replace(',', '') ?: 0;
        $laporanPerjalanan->helper =  Str::of($request->helper)->replace(',', '') ?: 0;
        $laporanPerjalanan->tkbm_muat =  Str::of($request->tkbm_muat)->replace(',', '') ?: 0;
        $laporanPerjalanan->tkbm_bongkar =  Str::of($request->tkbm_bongkar)->replace(',', '') ?: 0;
        $laporanPerjalanan->forklift =  Str::of($request->forklift)->replace(',', '') ?: 0;
        $laporanPerjalanan->security =  Str::of($request->security)->replace(',', '') ?: 0;
        $laporanPerjalanan->bbm =  Str::of($request->bbm)->replace(',', '') ?: 0;
        $laporanPerjalanan->etoll =  Str::of($request->etoll)->replace(',', '') ?: 0;
        $laporanPerjalanan->total_pengeluaran =  Str::of($request->total_pengeluaran)->replace(',', '') ?: 0;
        $laporanPerjalanan->sisa_uang_jalan =  Str::of($request->sisa_uang_jalan)->replace(',', '') ?: 0;
        $laporanPerjalanan->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Laporan Perjalanan Diubah',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanPerjalanan  $laporanPerjalanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanPerjalanan $laporanPerjalanan)
    {
        $laporanPerjalanan->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Laporan Perjalanan Dihapus',
        ], 200);
    }
}
