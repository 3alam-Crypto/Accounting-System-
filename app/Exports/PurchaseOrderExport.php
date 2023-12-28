<?php

namespace App\Exports;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderProduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PurchaseOrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PurchaseOrder::with('purchaseOrderProducts')->get();
    }

    public function headings(): array
    {
        return [
            // Purchase Order fields
            'Customer Name',
            'Customer Phone',
            'Customer State',
            'Customer Company Name',
            'Customer Address 1',
            'Customer Address 2',
            'Customer Email',
            'Customer City',
            'Customer Zip Code',
            'Billing Name',
            'Billing Phone',
            'Billing State',
            'Billing Company Name',
            'Billing Address 1',
            'Billing Address 2',
            'Billing Email',
            'Billing City',
            'Billing Zip Code',
            'Note',
            'Payment',
            'Shipping',
            'Total Quantity',
            'Total Price',

            // Purchase Order Product fields
            'Brand Name',
            'Our ID',
            'Product Name',
            'Quantity',
            'Product Price',
        ];
    }

    public function map($purchaseOrder): array
    {
        $purchaseOrderProducts = $purchaseOrder->purchaseOrderProducts;

    return $purchaseOrderProducts->map(function ($product) use ($purchaseOrder) {
        return [
            // Purchase Order fields
            $purchaseOrder->customer_name,
            $purchaseOrder->customer_phone,
            $purchaseOrder->customer_state,
            $purchaseOrder->customer_company_name,
            $purchaseOrder->customer_address_1,
            $purchaseOrder->customer_address_2,
            $purchaseOrder->customer_email,
            $purchaseOrder->customer_city,
            $purchaseOrder->customer_zip_code,
            $purchaseOrder->billing_name,
            $purchaseOrder->billing_phone,
            $purchaseOrder->billing_state,
            $purchaseOrder->billing_company_name,
            $purchaseOrder->billing_address_1,
            $purchaseOrder->billing_address_2,
            $purchaseOrder->billing_email,
            $purchaseOrder->billing_city,
            $purchaseOrder->billing_zip_code,
            $purchaseOrder->note,
            $purchaseOrder->payment,
            $purchaseOrder->shipping,
            $purchaseOrder->total_quantity,
            $purchaseOrder->total_price,

            // Purchase Order Product fields
            $product->brand->name ?? '',
            $product->our_id,
            $product->product_name,
            $product->quantity,
            $product->product_price,
        ];
    })->toArray();

        
    }
}
