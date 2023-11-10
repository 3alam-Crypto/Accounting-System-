<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Platform;
use App\Models\Brand;
use App\Models\Sale;
use PDF;


class ReportController extends Controller
{
    public function viewMonthly()
    {
        $platforms = Platform::all();
        $brands = Brand::all();

        
        $month = request()->get('month', now()->month);


        $totals = [];
        $brandTotals = [];

        foreach ($brands as $brand) {
            $totals[$brand->id] = [];
            $brandTotal = 0;

            foreach ($platforms as $platform) {
                $totalSales = Sale::where('brand_id', $brand->id)
                    ->where('platform_id', $platform->id)
                    ->whereMonth('shipping_date', $month)
                    ->sum('total_net_received');

                $totals[$brand->id][$platform->id] = $totalSales;
                $brandTotal += $totalSales;
            }

            $brandTotals[$brand->id] = $brandTotal;
        }

        return view('admin.report.month', compact('platforms', 'brands', 'totals', 'brandTotals', 'month'));
    }

    public function exportReport() 
    {
        $platforms = Platform::all();
        $brands = Brand::all();
        $pdf = Pdf::loadView('admin.report.pdf',[
            'platforms'=>$platforms,
            'brands'=>$brands
        ]);
        return $pdf->download('pdf.pdf');
        
    }
}
