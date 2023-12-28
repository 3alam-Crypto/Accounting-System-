<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Sale::with('platform', 'brand', 'country', 'status')->get();
    }

    /**
     * @param mixed $sale
     *
     * @return array
     */
    public function map($sale): array
    {
        return [
            'Platform' => $sale->platform->name ?? null,
            'Brand' => $sale->brand->name ?? null,
            'Country' => $sale->country->country_name ?? null,
            'Vendor Invoice Number' => $sale->vendor_invoice_number,
            'Order Date' => $sale->order_date,
            'Product Model' => $sale->product_model,
            'Product Name' => $sale->product_name,
            'Quantity' => $sale->quantity,
            'Customer Address' => $sale->customer_address,
            'City' => $sale->city,
            'Zip Code' => $sale->zip_code,
            'State' => $sale->state,
            'Unit Price' => $sale->unit_price,
            'Special Shipping Cost' => $sale->special_shipping_cost,
            'Platform Tax' => $sale->platform_tax,
            'Discount Percent' => $sale->discount_percent,
            'Discount Type' => $sale->discount_type,
            'Discount Value' => $sale->discount_value,
            'Total Net Received' => $sale->total_net_received,
            'Platform Fee' => $sale->platform_fee,
            'Shipping Cost' => $sale->shipping_cost,
            'Additional Shipping' => $sale->additional_shipping,
            'Manufacturer Tax' => $sale->manufacturer_tax,
            'Other Cost' => $sale->other_cost,
            'Product Cost' => $sale->product_cost,
            'Gross Profit' => $sale->gross_profit,
            'Gross Profit Percentage' => $sale->gross_profit_percentage,
            'Due Date Shipping' => $sale->due_date_shipping,
            'Status' => $sale->status->name ?? null,
            'Tax Exempt' => $sale->tax_exempt,
            'Ramo Trading Order ID' => $sale->ramo_trading_order_id,
            'First Name' => $sale->first_name,
            'Last Name' => $sale->last_name,
            'Company Name' => $sale->company_name,
            'Billing First Name' => $sale->billing_first_name,
            'Billing Last Name' => $sale->billing_last_name,
            'Billing Company Name' => $sale->billing_company_name,
            'Billing Address' => $sale->billing_address,
            'Billing City' => $sale->billing_city,
            'Billing Zip Code' => $sale->billing_zip_code,
            'Billing State' => $sale->billing_state,
            'Billing Country' => $sale->billingCountry->country_name ?? null,
            'Note' => $sale->note,
            'Tracking Number' => $sale->tracking_number,
            'Created At' => $sale->created_at,
            'Updated At' => $sale->updated_at,
            // Add other fields as needed
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Platform',
            'Brand',
            'Country',
            'Vendor Invoice Number',
            'Order Date',
            'Product Model',
            'Product Name',
            'Quantity',
            'Customer Address',
            'City',
            'Zip Code',
            'State',
            'Unit Price',
            'Special Shipping Cost',
            'Platform Tax',
            'Discount Percent',
            'Discount Type',
            'Discount Value',
            'Total Net Received',
            'Platform Fee',
            'Shipping Cost',
            'Additional Shipping',
            'Manufacturer Tax',
            'Other Cost',
            'Product Cost',
            'Gross Profit',
            'Gross Profit Percentage',
            'Due Date Shipping',
            'Status',
            'Tax Exempt',
            'Ramo Trading Order ID',
            'First Name',
            'Last Name',
            'Company Name',
            'Billing First Name',
            'Billing Last Name',
            'Billing Company Name',
            'Billing Address',
            'Billing City',
            'Billing Zip Code',
            'Billing State',
            'Billing Country',
            'Note',
            'Tracking Number',
            'Created At',
            'Updated At',
            // Add other headings as needed
        ];
    }
}
