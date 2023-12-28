<?php

namespace App\Exports;

use App\Models\Quotation;
use App\Models\QuotationProduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QuotationExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Quotation::with('quotationProducts')->get();
    }

    public function headings(): array
    {
        return [
            // Quotation fields
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
            'Quotation Type',
            'Note',
            'Valid',
            'Payment',
            'Total Price',
            'Total Tax',
            'Shipping Cost',
            'Total Discount',

            // Quotation Product fields
            'Brand Name',
            'Our ID',
            'Product Name',
            'Quantity',
            'Product Price',
            'Discount',
            'Shipping Cost',
            'Shipping Type',
        ];
    }

    public function map($quotation): array
    {
        $quotationProducts = $quotation->quotationProducts;

        return $quotationProducts->map(function ($product) use ($quotation) {
            return [
                // Quotation fields
                $quotation->customer_name,
                $quotation->customer_phone,
                $quotation->customer_state,
                $quotation->customer_company_name,
                $quotation->customer_address_1,
                $quotation->customer_address_2,
                $quotation->customer_email,
                $quotation->customer_city,
                $quotation->customer_zip_code,
                $quotation->billing_name,
                $quotation->billing_phone,
                $quotation->billing_state,
                $quotation->billing_company_name,
                $quotation->billing_address_1,
                $quotation->billing_address_2,
                $quotation->billing_email,
                $quotation->billing_city,
                $quotation->billing_zip_code,
                $quotation->quotation_type,
                $quotation->note,
                $quotation->valid,
                $quotation->payment,
                $quotation->total_price,
                $quotation->total_tax,
                $quotation->shipping_cost,
                $quotation->total_discount,

                // Quotation Product fields
                $product->brand->name ?? '',
                $product->our_id,
                $product->product_name,
                $product->quantity,
                $product->product_price,
                $product->discount,
                $product->shipping_cost,
                $product->shipping_type,
            ];
        })->toArray();
    }
}
