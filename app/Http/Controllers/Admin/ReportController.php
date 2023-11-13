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

            
            $totals[$month]['total'] = array_sum($totals[$month]);
        }


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
    
    
    public function viewBrandYearly()
    {
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
        $brandTotals = [];
        
        foreach ($months as $month => $monthName) {
            $totals[$month] = [];
            
            foreach ($brands as $brand) {
                $totalSales = Sale::where('brand_id', $brand->id)
                ->whereMonth('shipping_date', $month)
                ->sum('total_net_received');
                
                $totals[$month][$brand->id] = $totalSales;
            }
            
            $totals[$month]['total'] = array_sum($totals[$month]);
        }
        
        $grandTotal = ['total' => ['total' => 0]];
        
        foreach ($brands as $brand) {
            
            $brandTotals[$brand->id] = [
                'Q1' => 0,
                'Q2' => 0,
                'Q3' => 0,
                'Q4' => 0,
            ];
            
            foreach ($months as $month => $monthName) {
                $brandTotals[$brand->id]['Q' . ceil($month / 3)] += $totals[$month][$brand->id];
            }
            
            $brandTotals[$brand->id]['total'] = array_sum($brandTotals[$brand->id]);
            $grandTotal['total'][$brand->id] = $brandTotals[$brand->id]['total'];
            $grandTotal['total']['total'] += $brandTotals[$brand->id]['total'];
        }
        
        $can = ($grandTotal['total']['total'] * 0.1) / 100;
        
        return view('admin.report.yearBrand', compact('brands', 'months', 'totals', 'grandTotal', 'can', 'brandTotals'));
    }
}
