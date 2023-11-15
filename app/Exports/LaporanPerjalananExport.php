<?php 

namespace App\Exports;

use App\Models\LaporanPerjalanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class LaporanPerjalananExport implements FromView
{
    public function view(): View
    {
        return view('pages.web.laporanPerjalanan.excel', [
            'laporanPerjalanan' => LaporanPerjalanan::all()
        ]);
    }

    public function export() {
        return Excel::download(new LaporanPerjalananExport, 'Laporan_Perjalanan.xlsx');
    }
}