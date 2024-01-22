<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_state',
        'customer_company_name',
        'customer_address_1',
        'customer_address_2',
        'customer_email',
        'customer_city',
        'customer_zip_code',
        'billing_name',
        'billing_phone',
        'billing_state',
        'billing_company_name',
        'billing_address_1',
        'billing_address_2',
        'billing_email',
        'billing_city',
        'billing_zip_code',
        'quotation_type',
        'note',
        'valid',
        'payment',
        'total_price',
        'total_tax',
        'shipping_cost',
        'total_discount',
    ];

    public function quotationProducts()
    {
        return $this->hasMany(QuotationProduct::class);
    }

    public function products()
    {
        return $this->hasMany(QuotationProduct::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
}
