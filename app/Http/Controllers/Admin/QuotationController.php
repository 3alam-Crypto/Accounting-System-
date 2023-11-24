<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quotation; 
use App\Models\QuotationProduct;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        $quotationProducts = QuotationProduct::with('quotation')->get();
        $uniqueQuotations = $quotationProducts->groupBy('quotation_id')->map(function ($group) {
            return $group->first();
        });
        
        return view('admin.quotation.index', compact('uniqueQuotations'));
    }

    public function create()
    {
        
        $brands = Brand::all();

        return view('admin.quotation.create', ['brands' => $brands]);
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'customer_phone' => 'nullable',
            'customer_state' => 'nullable',
            'customer_company_name' => 'nullable',
            'customer_address_1' => 'nullable',
            'customer_address_2' => 'nullable',
            'customer_city' => 'nullable',
            'customer_zip_code' => 'nullable',
            'billing_name' => 'nullable',
            'billing_email' => 'nullable|email',
            'billing_phone' => 'nullable',
            'billing_state' => 'nullable',
            'billing_company_name' => 'nullable',
            'billing_address_1' => 'nullable',
            'billing_address_2' => 'nullable',
            'billing_city' => 'nullable',
            'billing_zip_code' => 'nullable',
            'quotation_type' => 'nullable',
            'note' => 'nullable',
            'valid' => 'nullable',
            'payment' => 'nullable',
            'total_price' => 'nullable|numeric',
            'total_tax' => 'nullable|numeric',
            'shipping_cost' => 'nullable|numeric',
            'total_discount' => 'nullable|numeric',
            'brand_id.*' => 'nullable',
            'product_name.*' => 'nullable',
            'quantity.*' => 'nullable|numeric',
            'product_price.*' => 'nullable|numeric',
            'discount.*' => 'nullable|numeric',
            'shipping_cost.*' => 'nullable|numeric',
            'shipping_type.*' => 'nullable',
        ]);

        
        $quotation = Quotation::create($validatedData);

        $shippingType = $request->input('shipping_type')[0];

        
        if ($request->filled('brand_id')) {
            $productsData = $request->only(['brand_id', 'product_name', 'quantity', 'product_price', 'discount', 'shipping_cost', 'shipping_type']);
            foreach ($productsData['brand_id'] as $key => $value) {

                $lastOrder = QuotationProduct::whereHas('quotation', function ($query) use ($value) {
                    $query->where('brand_id', $value);
                })->latest('our_id')->first();
    
                
                $ourId = $lastOrder ? $lastOrder->our_id + 1 : 1;
                
                QuotationProduct::create([
                    'quotation_id' => $quotation->id,
                    'brand_id' => $value,
                    'our_id' => $ourId,
                    'product_name' => $productsData['product_name'][$key],
                    'quantity' => $productsData['quantity'][$key],
                    'product_price' => $productsData['product_price'][$key],
                    'discount' => $productsData['discount'][$key],
                    'shipping_cost' => isset($productsData['shipping_cost'][$key]) ? $productsData['shipping_cost'][$key] : null,
                    'shipping_type' => $shippingType,
                ]);
            }
        }

        return redirect()->route('quotation')->with('success', 'Quotation created successfully');
    }
}
