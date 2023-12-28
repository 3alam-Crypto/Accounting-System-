<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class BrandYearlyExport implements FromView
{
    private $brands;
    private $months;
    private $totals;
    private $grandTotal;
    private $can;
    private $brandTotals;

    public function __construct($brands, $months, $totals, $grandTotal, $can, $brandTotals)
    {
        $this->brands = $brands;
        $this->months = $months;
        $this->totals = $totals;
        $this->grandTotal = $grandTotal;
        $this->can = $can;
        $this->brandTotals = $brandTotals;
    }

    public function view(): View
    {
        return view('admin.report.excelYearBrand', [
            'brands' => $this->brands,
            'months' => $this->months,
            'totals' => $this->totals,
            'grandTotal' => $this->grandTotal,
            'can' => $this->can,
            'brandTotals' => $this->brandTotals,
        ]);
    }
}
