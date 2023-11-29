<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expenses;
use App\Models\Sale;
use App\Models\Platform;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentPlanController extends Controller
{
    public function paymentPlan()
    {
        return view('admin.paymentPlan.index');
    }

    public function generatePaymentPlan(Request $request)
    {
        
        $initialBalance = $request->input('initial_balance');
        $startDate = now()->parse($request->input('start_date'))->startOfDay();
        $endDate = now()->parse($request->input('end_date'))->endOfDay();

        
        $currentDay = (int)date('j');
        $currentMonth = now()->month;
        $previousMonth = now()->subMonth()->month;

        
        $expenses = Expenses::where('due_date', '>=', $startDate)
            ->where('due_date', '<=', $endDate)
            ->where('status', 0)
            ->orderBy('priority')
            ->get();

        
        $sales = Sale::where('order_date', '>=', $startDate)
            ->where('order_date', '<=', $endDate)
            ->where('status_id', Status::where('name', 'Done')->first()->id)
            ->get();

        
            $salesPaid = $sales->filter(function ($sale) use ($currentDay, $currentMonth, $previousMonth) {
                $platform = Platform::find($sale->platform_id);
                $payout1Day = $platform->pay_out_1;
                $orderDateMonth = Carbon::createFromFormat('Y-m-d', $sale->order_date)->month;
                $orderDateDay = Carbon::createFromFormat('Y-m-d', $sale->order_date)->day;
                
        
                if ($orderDateMonth === $currentMonth) {
                    if (($platform->immediately === 1))
                    {
                        return true;
                    } elseif($currentDay >= $payout1Day)
                    {
                        return ($orderDateDay <= $payout1Day);
                    }
                } elseif ($orderDateMonth === $previousMonth) {
                    return true;
                }
        
                return false;
            });

            $salesToBePaid = $sales->filter(function ($sale) use ($currentDay, $currentMonth) {
                $platform = Platform::find($sale->platform_id);
                $payout1Day = $platform->pay_out_1;
                $payout2Day = $platform->pay_out_2;
                $orderDateMonth = Carbon::createFromFormat('Y-m-d', $sale->order_date)->month;
                $orderDateDay = Carbon::createFromFormat('Y-m-d', $sale->order_date)->day;
        
                if ($orderDateMonth === $currentMonth) {
                    if ($currentDay <= $payout1Day) {
                        return ($orderDateDay <= $payout1Day) ||($orderDateDay >= $payout1Day && $orderDateDay <= $payout1Day);
                    }
                }
        
                return false;
            });

        
        $response = [
            'initial_balance' => $initialBalance,
            'expenses' => $expenses,
            'sales_paid' => $salesPaid,
            'sales_to_be_paid' => $salesToBePaid,
        ];

        return response()->json($response);
    }

}
