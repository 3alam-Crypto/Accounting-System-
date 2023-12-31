<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $table = 'platforms';

    protected $fillable = ['name', 'pay_out_1', 'pay_out_2', 'immediately', 'shipment_status', 'sales_status'];
}
