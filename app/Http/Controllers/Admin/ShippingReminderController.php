<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon; 
use App\Models\Sale;
use App\Mail\SalesReminderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ShippingReminderController extends Controller
{
    public function sendReminderEmail(Request $request)
    {
        $today = Carbon::today();
        $startDate = Carbon::today()->subDays(15);

        $sales = Sale::whereDate('order_date', '>=', $startDate)
        ->whereRaw('JSON_CONTAINS(tracking_number, \'[null]\')')
        ->with('platform')
        ->get();

        $salesToRemind = [];

        foreach ($sales as $sale) {
            $shipDate = $sale->platform->ship_date;

            $orderDate = Carbon::parse($sale->order_date);
            $todayCopy = $today->copy();
            
            
            $daysToShip = $todayCopy->diffInDays($orderDate->addDays($shipDate));
            

            if ($daysToShip <= 2) {
                $salesToRemind[] = $sale;
            }
        }

        
        
        

        $htmlContent = view('admin.email.sales-reminder', ['salesToRemind' => $salesToRemind])->render();

        // Send email using SalesReminderMail Mailable class
        Mail::to('bilalhamwia95@gmail.com')->send(new SalesReminderMail($salesToRemind));

        return "Reminder emails sent successfully!";
    }
}
