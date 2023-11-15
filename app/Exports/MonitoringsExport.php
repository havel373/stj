<?php 

namespace App\Exports;

use App\Models\MasterStatus;
use App\Models\Monitoring;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringsExport implements FromView
{
    public function view(): View
    {
        return view('pages.web.sopir.monitoring.excel', [
            'data' => Monitoring::orderBy('created_at','desc')->get(),
            'status' => MasterStatus::get(),
        ]);
    }

    public function export() {
        return Excel::download(new MonitoringsExport, 'monitorings.xlsx');
    }
}