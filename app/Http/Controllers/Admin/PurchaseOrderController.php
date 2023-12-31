<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderProduct;
use App\Exports\PurchaseOrderExport;
use Maatwebsite\Excel\Facades\Excel;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrderProducts = PurchaseOrderProduct::with('purchaseOrder')->get();
        $uniquePurchaseOrders = $purchaseOrderProducts->groupBy('purchase_order_id')->map(function ($group) {
            return $group->first();
        });
        return view('admin.purchaseOrder.index', compact('uniquePurchaseOrders'));
    }


    public function create()
    {
        $brands = Brand::all();

        return view('admin.purchaseOrder.create', compact('brands'));
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'brand_id.*' => 'nullable|exists:brands,id',
            'product_name.*' => 'nullable|string|max:255',
            'quantity.*' => 'nullable|integer|min:1',
            'product_price.*' => 'nullable|numeric|min:0.01',
            'customer_name' => 'nullable|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_state' => 'nullable|string|max:100',
            'customer_email' => 'nullable|email',
            'customer_city' => 'nullable|string|max:100',
            'customer_zip_code' => 'nullable|string|max:20',
            'customer_company_name' => 'nullable|string|max:255',
            'customer_address_1' => 'nullable|string|max:255',
            'customer_address_2' => 'nullable|string|max:255',
            'billing_name' => 'nullable|string|max:255',
            'billing_phone' => 'nullable|string|max:20',
            'billing_state' => 'nullable|string|max:100',
            'billing_email' => 'nullable|email',
            'billing_city' => 'nullable|string|max:100',
            'billing_zip_code' => 'nullable|string|max:20',
            'billing_company_name' => 'nullable|string|max:255',
            'billing_address_1' => 'nullable|string|max:255',
            'billing_address_2' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:500',
            'payment' => 'nullable|string|max:100',
            'shipping' => 'nullable|string|max:100',
            'total_quantity' => 'nullable|integer|min:1',
            'total_price' => 'nullable|numeric|min:0.01',
        ]);
        
        $purchaseOrder = PurchaseOrder::create($validatedData);
        
        $brandId = $request->input('brand_id')[0];
        
        $lastOrder = PurchaseOrderProduct::whereHas('purchaseOrder', function ($query) use ($brandId) {
            $query->where('brand_id', $brandId);
        })->latest('our_id')->first();
        
        $ourId = $lastOrder ? $lastOrder->our_id + 1 : 1;
        
        // Get the ID of the created PurchaseOrder
        $purchaseOrderId = $purchaseOrder->id; // Retrieve the ID of the newly created PurchaseOrder
        
        // Create Purchase Order Products
        foreach ($request['product_name'] as $key => $productName) {
            $brandId = $request['brand_id'][$key];
            $purchaseOrderProduct = new PurchaseOrderProduct([
                'brand_id' => $brandId,
                'our_id' => $ourId,
                'product_name' => $productName,
                'quantity' => $request['quantity'][$key],
                'product_price' => $request['product_price'][$key],
            ]);
            
            // Associate the PurchaseOrderProduct with the PurchaseOrder
            $purchaseOrder->purchaseOrderProducts()->save($purchaseOrderProduct);
        }
        
        
        return redirect()->route('purchaseOrder')->with('success', 'Purchase Order created successfully');

    }
    
    public function edit($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $brands = Brand::all(); // Assuming you have a Brand model
        return view('admin.purchaseOrder.edit', compact('purchaseOrder', 'brands'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'brand_id.*' => 'nullable|exists:brands,id',
            'product_name.*' => 'nullable|string|max:255',
            'quantity.*' => 'nullable|integer|min:1',
            'product_price.*' => 'nullable|numeric|min:0.01',
            'customer_name' => 'nullable|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_state' => 'nullable|string|max:100',
            'customer_email' => 'nullable|email',
            'customer_city' => 'nullable|string|max:100',
            'customer_zip_code' => 'nullable|string|max:20',
            'customer_company_name' => 'nullable|string|max:255',
            'customer_address_1' => 'nullable|string|max:255',
            'customer_address_2' => 'nullable|string|max:255',
            'billing_name' => 'nullable|string|max:255',
            'billing_phone' => 'nullable|string|max:20',
            'billing_state' => 'nullable|string|max:100',
            'billing_email' => 'nullable|email',
            'billing_city' => 'nullable|string|max:100',
            'billing_zip_code' => 'nullable|string|max:20',
            'billing_company_name' => 'nullable|string|max:255',
            'billing_address_1' => 'nullable|string|max:255',
            'billing_address_2' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:500',
            'payment' => 'nullable|string|max:100',
            'shipping' => 'nullable|string|max:100',
            'total_quantity' => 'nullable|integer|min:1',
            'total_price' => 'nullable|numeric|min:0.01',
        ]);
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        
        // Update Purchase Order details
        $purchaseOrder->update($validatedData);
        
        // Update or Create Purchase Order Products
        foreach ($request['product_name'] as $key => $productName) {
            $brandId = $request['brand_id'][$key];
            
            // Check if the product already exists for the Purchase Order
            $existingProduct = $purchaseOrder->products()->where('brand_id', $brandId)->first();
            
            if ($existingProduct) {
                $existingProduct->update([
                    'product_name' => $productName,
                    'quantity' => $request['quantity'][$key],
                    'product_price' => $request['product_price'][$key],
                ]);
            
            } else {
                // Create new product if it doesn't exist
                $purchaseOrder->products()->create([
                    'brand_id' => $brandId,
                    'product_name' => $productName,
                    'quantity' => $request['quantity'][$key],
                    'product_price' => $request['product_price'][$key],
                ]);
            }
        }
        return redirect()->route('purchaseOrder')->with('success', 'Purchase Order updated successfully');
    }

    public function export()
    {
        return Excel::download(new PurchaseOrderExport(), 'purchase_orders.xlsx');
    }
}
