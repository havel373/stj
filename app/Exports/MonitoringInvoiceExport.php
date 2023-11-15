<?php

namespace App\Exports;

use App\Models\Monitoring;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonitoringInvoiceExport implements FromView
{
    protected $monitoring;

    public function __construct($monitoring)
    {
        $this->monitoring = $monitoring;
    }

    public function view(): View
    {
        $monitoringData = Monitoring::find($this->monitoring);
        return view('pages.web.monitoring.invoice', [
            'monitoring' => $monitoringData
        ]);
    }
}
