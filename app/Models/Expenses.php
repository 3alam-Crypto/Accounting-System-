<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $fillable = [
        'expenses_type_id',
        'installment_amount',
        'installment_count',
        'amount',
        'status',
        'due_date',
        'paid_date',
        'charges',
        'due_charges',
        'period',
        'priority',
        'group_id',
    ];

    public function expensesType()
    {
        return $this->belongsTo(ExpensesType::class, 'expenses_type_id');
    }
}
