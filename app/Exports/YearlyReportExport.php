<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class YearlyReportExport implements FromView
{
    protected $platforms;
    protected $brands;
    protected $months;
    protected $totals;
    protected $grandTotal;

    public function __construct($platforms, $brands, $months, $totals, $grandTotal)
    {
        $this->platforms = $platforms;
        $this->brands = $brands;
        $this->months = $months;
        $this->totals = $totals;
        $this->grandTotal = $grandTotal;
    }

    public function view(): View
    {
        return view('admin.report.excelYear', [
            'platforms' => $this->platforms,
            'brands' => $this->brands,
            'months' => $this->months,
            'totals' => $this->totals,
            'grandTotal' => $this->grandTotal,
        ]);
    }
}

