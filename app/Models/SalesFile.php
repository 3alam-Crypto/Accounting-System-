<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesFile extends Model
{
    use HasFactory;

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function salesFileType()
    {
        return $this->belongsTo(SalesFileType::class, 'salesFileType_id');
        
    }
}
