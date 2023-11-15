<?php 

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class CustomerExport implements FromView
{
    public function view(): View
    {
        return view('pages.web.customer.excel', [
            'customer' => Customer::all()
        ]);
    }

    public function export() {
        return Excel::download(new CustomerExport, 'customer.xlsx');
    }
}