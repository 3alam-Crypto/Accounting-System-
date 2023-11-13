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
        $brandGrossMargins = [];

        foreach ($brands as $brand) {
            $totals[$brand->id] = [];
            $brandTotal = 0;
            $grossMargin = 0;

            foreach ($platforms as $platform) {
                $totalSales = Sale::where('brand_id', $brand->id)
                    ->where('platform_id', $platform->id)
                    ->whereMonth('shipping_date', $month)
                    ->sum('total_net_received');

                $grossProfit = Sale::where('brand_id', $brand->id)
                    ->where('platform_id', $platform->id)
                    ->whereMonth('shipping_date', $month)
                    ->sum('gross_profit');

                $totals[$brand->id][$platform->id] = $totalSales;
                $brandTotal += $totalSales;

                
                $grossMargin += $grossProfit;
            }

            $brandTotals[$brand->id] = $brandTotal;
            $brandGrossMargins[$brand->id] = $grossMargin;

            $Percentages[$brand->id] = ($brandTotal > 0) ? ($grossMargin / $brandTotal) * 100 : 0;
        }

        return view('admin.report.month', compact('platforms', 'brands', 'totals', 'brandTotals', 'brandGrossMargins',  'Percentages' , 'month'));
    }

    public function viewYearly()
    {
        $platforms = Platform::all();
        $brands = Brand::all();

        
        $months = [
            1 => 'JAN',
            2 => 'FEB',
            3 => 'Mar',
            4 => 'April',
            5 => 'May',
            6 => 'Jun',
            7 => 'July',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec',
        ];

        $totals = [];

        foreach ($months as $month => $monthName) {
            $totals[$month] = [];

            foreach ($platforms as $platform) {
                $totalSales = Sale::whereMonth('shipping_date', $month)
                    ->where('platform_id', $platform->id)
                    ->sum('total_net_received');

                $totals[$month][$platform->id] = $totalSales;
            }

            // Calculate the grand total for the current month
            $totals[$month]['total'] = array_sum($totals[$month]);
        }

        // Calculate the grand total for each platform and the overall grand total
        $grandTotal = ['total' => ['total' => 0]];

        foreach ($platforms as $platform) {
            $grandTotal['total'][$platform->id] = 0;

            foreach ($months as $month => $monthName) {
                $grandTotal['total'][$platform->id] += $totals[$month][$platform->id];
            }

            $grandTotal['total']['total'] += $grandTotal['total'][$platform->id];
        }

        return view('admin.report.year', compact('platforms', 'brands', 'months', 'totals', 'grandTotal'));
    }
}
