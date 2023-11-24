<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'brand_id',
        'our_id',
        'product_name',
        'quantity',
        'product_price',
        'discount',
        'shipping_cost',
        'shipping_type',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }
}
