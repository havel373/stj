<?php 

namespace App\Exports;

use App\Models\RequestUangJalan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class RequestUangJalanExport implements FromView
{
    public function view(): View
    {
        return view('pages.web.reqUJ.excel', [
            'reqUJ' => RequestUangJalan::all()
        ]);
    }

    public function export() {
        return Excel::download(new RequestUangJalanExport, 'reqUJ.xlsx');
    }
}