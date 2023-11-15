<?php 

namespace App\Exports;

use App\Models\Schedule;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class ScheduleExport implements FromView
{
    public function view(): View
    {
        return view('pages.web.schedule.excel', [
            'schedule' => Schedule::all()
        ]);
    }

    public function export() {
        return Excel::download(new ScheduleExport, 'schedule.xlsx');
    }
}