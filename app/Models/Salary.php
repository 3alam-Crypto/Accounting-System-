<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['employee_id', 'status', 'payout_date', 'amount'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
