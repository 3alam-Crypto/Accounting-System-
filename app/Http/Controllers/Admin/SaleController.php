<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Platform;
use App\Models\Brand;
use App\Models\Country;
use App\Models\SalesFile;
use App\Models\SalesFileType;
use App\Models\Status;

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
        $statuses = Status::all();
        
        return view('admin.sale.create', compact('platforms', 'brands', 'countries', 'statuses'));
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
            'due_date_shipping' => 'nullable|date',
            'tracking_number_1' => 'nullable|string',
            'tracking_number_2' => 'nullable|string',
            'status_id' => 'nullable|exists:statuses,id',
        ]);

        
        $sale = Sale::create($validatedData);

        
        return redirect()->route('sale')->with('success', 'Sale created successfully');
        
    }

    public function edit(Sale $sale) {

        $platforms = Platform::all();
        $brands = Brand::all();
        $countries = Country::all();
        $statuses = Status::all();

        return view('admin.sale.edit', compact('sale', 'platforms', 'brands', 'countries', 'statuses'));
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
            'due_date_shipping' => 'nullable|date',
            'tracking_number_1' => 'nullable|string',
            'tracking_number_2' => 'nullable|string',
            'status_id' => 'nullable|exists:statuses,id',
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

    public function createFile()
    {
        $sale = Sale::first();
        $salesFileTypes = SalesFileType::all();
        
        return view('admin.sale.createFile', compact('sale', 'salesFileTypes'));
    }

    public function storeFile(Request $request, $saleId)
    {
        $request->validate([
            'salesFileType' => 'required|exists:sales_file_types,id',
            'fileUpload' => 'required|max:2048',
        ]);
        
        $saleFile = new SalesFile();
        $saleFile->salesFileType_id = $request->input('salesFileType');
        $saleFile->sale_id = $saleId;
        
        if ($request->hasFile('fileUpload') && $request->file('fileUpload')->isValid()) {
            $file = $request->file('fileUpload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            //This uploading the files to Public Folder to bee accessable and give the link to the file not the file path 
            // $file->storeAs('sales_files', $fileName);
            $file->move(public_path('sales_files'), $fileName);            
            
            $saleFile->uploadFiles = $fileName;
            $saleFile->file_location = asset('sales_files/'.$fileName) ;
            $saleFile->save();
            
            return redirect()->route('sale', ['sale' => $saleId])->with('success', 'File uploaded successfully.');
        }
        
        return redirect()->route('sale', ['sale' => $saleId])->with('error', 'File upload failed.');
    }

    public function viewFile(Sale $sale)
    {
        $salesFiles = SalesFile::with('salesFileType')->where('sale_id', $sale->id)->get();
        return view('admin.sale.viewFile', compact('salesFiles'));
    }

    public function awaitingShipping()
    {
        $awaitingShippingSales = Sale::whereNull('tracking_number_1')
        ->orWhereNull('tracking_number_2')
        ->orWhereNull('due_date_shipping')
        ->get();
        return view('admin.sale.awaitingShipping.index', compact('awaitingShippingSales'));
    }
}
