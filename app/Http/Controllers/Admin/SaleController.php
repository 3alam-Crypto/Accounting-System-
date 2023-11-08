<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Platform;
use App\Models\Brand;
use App\Models\Country;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('admin.sale.index', compact('sales'));
    }

    public function create()
    {
        
        $platforms = Platform::all();
        $brands = Brand::all();
        $countries = Country::all();
        
        return view('admin.sale.create', compact('platforms', 'brands', 'countries'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vendor_invoice_number' => 'nullable|string',
            'vendor_confirmation' => 'nullable|string',
            'market_place_po' => 'nullable|string',
            'shipping_date' => 'nullable|date',
            'our_order_id' => 'nullable|string',
            'order_date' => 'nullable|date',
            'product_model' => 'nullable|string',
            'product_name' => 'required|string',
            'quantity' => 'nullable|integer',
            'customer_name' => 'required|string',
            'customer_address' => 'required|string',
            'city' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'state' => 'nullable|string',
            'unit_price' => 'nullable|numeric',
            'special_shipping_cost' => 'nullable|numeric',
            'platform_tax' => 'nullable|numeric',
            'discount_percent' => 'nullable|numeric',
            'discount_value' => 'nullable|numeric',
            'total_net_received' => 'nullable|numeric',
            'platform_fee' => 'nullable|numeric',
            'shipping_cost' => 'nullable|numeric',
            'additional_shipping' => 'nullable|numeric',
            'manufacturer_tax' => 'nullable|numeric',
            'other_cost' => 'nullable|numeric',
            'product_cost' => 'nullable|numeric',
            'gross_profit' => 'nullable|numeric',
            'gross_profit_percentage' => 'nullable|numeric',
            'platform_id' => 'nullable|exists:platforms,id',
            'brand_id' => 'nullable|exists:brands,id',
            'country_id' => 'nullable|exists:countries,id',
        ]);

        
        $sale = Sale::create($validatedData);

        
        return redirect()->route('sale')->with('success', 'Sale created successfully');
        
    }

    public function edit(Sale $sale) {

        $platforms = Platform::all();
        $brands = Brand::all();
        $countries = Country::all();

        return view('admin.sale.edit', compact('sale', 'platforms', 'brands', 'countries'));
    }
    
    public function update(Request $request, Sale $sale) {

        $validatedData = $request->validate([
            'vendor_invoice_number' => 'nullable|string',
            'vendor_confirmation' => 'nullable|string',
            'market_place_po' => 'nullable|string',
            'shipping_date' => 'nullable|date',
            'our_order_id' => 'nullable|string',
            'order_date' => 'nullable|date',
            'product_model' => 'nullable|string',
            'product_name' => 'required|string',
            'quantity' => 'nullable|integer',
            'customer_name' => 'required|string',
            'customer_address' => 'required|string',
            'city' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'state' => 'nullable|string',
            'unit_price' => 'nullable|numeric',
            'special_shipping_cost' => 'nullable|numeric',
            'platform_tax' => 'nullable|numeric',
            'discount_percent' => 'nullable|numeric',
            'discount_value' => 'nullable|numeric',
            'total_net_received' => 'nullable|numeric',
            'platform_fee' => 'nullable|numeric',
            'shipping_cost' => 'nullable|numeric',
            'additional_shipping' => 'nullable|numeric',
            'manufacturer_tax' => 'nullable|numeric',
            'other_cost' => 'nullable|numeric',
            'product_cost' => 'nullable|numeric',
            'gross_profit' => 'nullable|numeric',
            'gross_profit_percentage' => 'nullable|numeric',
            'platform_id' => 'nullable|exists:platforms,id',
            'brand_id' => 'nullable|exists:brands,id',
            'country_id' => 'nullable|exists:countries,id',
        ]);
        
        $sale->update($validatedData);

        return redirect()->route('sale')->with('success', 'Sale Update successfully');   
    }

    public function view(Sale $sale)
    {
        $platforms = Platform::all();
        $brands = Brand::all();
        $countries = Country::all();

        return view('admin.sale.view', compact('sale', 'platforms', 'brands', 'countries'));
    }
    
}
