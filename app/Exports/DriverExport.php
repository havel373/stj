<?php 

namespace App\Exports;

use App\Models\Driver;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class DriverExport implements FromView
{
    public function view(): View
    {
        return view('pages.web.driver.excel', [
            'driver' => Driver::all()
        ]);
    }

    public function export() {
        return Excel::download(new DriverExport, 'driver.xlsx');
    }
}