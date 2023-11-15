<?php 

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeExport implements FromView
{
    public function view(): View
    {
        return view('pages.web.employee.excel', [
            'employee' => User::all()
        ]);
    }

    public function export() {
        return Excel::download(new EmployeeExport, 'employee.xlsx');
    }
}