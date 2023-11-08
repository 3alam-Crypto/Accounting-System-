<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_invoice_number',
        'vendor_confirmation',
        'market_place_po',
        'shipping_date',
        'our_order_id',
        'order_date',
        'product_model',
        'product_name',
        'quantity',
        'customer_name',
        'customer_address',
        'city',
        'zip_code',
        'state',
        'unit_price',
        'special_shipping_cost',
        'platform_tax',
        'discount_percent',
        'discount_value',
        'total_net_received',
        'platform_fee',
        'shipping_cost',
        'additional_shipping',
        'manufacturer_tax',
        'other_cost',
        'product_cost',
        'gross_profit',
        'gross_profit_percentage',
        'discount_value',
        'platform_id',
        'brand_id',
        'country_id',
    ];

    protected $attributes = [
        'vendor_invoice_number' => 0,
        'vendor_confirmation' => 0,
        'market_place_po' => 0,
        'shipping_date' => null,
        'our_order_id' => 0,
        'order_date' => null,
        'product_model' => 0,
        'quantity' => 0,
        'zip_code' => 0,
        'unit_price' => 0,
        'special_shipping_cost' => 0,
        'platform_tax' => 0,
        'discount_percent' => 0,
        'discount_value' => 0,
        'total_net_received' => 0,
        'platform_fee' => 0,
        'shipping_cost' => 0,
        'additional_shipping' => 0,
        'manufacturer_tax' => 0,
        'other_cost' => 0,
        'product_cost' => 0,
        'gross_profit' => 0,
        'gross_profit_percentage' => 0,
        'discount_value' =>0,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sale) {
            $numericFields = [
                'vendor_invoice_number',
                'vendor_confirmation',
                'market_place_po',
                'our_order_id',
                'product_model',
                'quantity',
                'zip_code',
                'unit_price',
                'special_shipping_cost',
                'platform_tax',
                'discount_percent',
                'discount_value',
                'total_net_received',
                'platform_fee',
                'shipping_cost',
                'additional_shipping',
                'manufacturer_tax',
                'other_cost',
                'product_cost',
                'gross_profit',
                'gross_profit_percentage',
            ];

            foreach ($numericFields as $field) {
                if (empty($sale->{$field})) {
                    $sale->{$field} = 0;
                }
            }

            
            $dateFields = ['shipping_date', 'order_date'];
            foreach ($dateFields as $field) {
                if (empty($sale->{$field})) {
                    $sale->{$field} = null;
                }
            }
        });
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
