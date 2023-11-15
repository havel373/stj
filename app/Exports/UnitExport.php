<?php 

namespace App\Exports;

use App\Models\Unit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class UnitExport implements FromView
{
    public function view(): View
    {
        return view('pages.web.unit.excel', [
            'unit' => Unit::all()
        ]);
    }

    public function export() {
        return Excel::download(new UnitExport, 'unit.xlsx');
    }
}