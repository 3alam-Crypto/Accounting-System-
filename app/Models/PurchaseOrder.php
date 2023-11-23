<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
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
        'note',
        'payment',
        'shipping',
        'total_quantity',
        'total_price',
    ];

    public function purchaseOrderProducts()
    {
        return $this->hasMany(PurchaseOrderProduct::class, 'purchase_order_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

}
