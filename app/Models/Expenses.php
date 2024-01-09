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
        'expenses_title',
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
        'description',
        'is_installment',
        'expense_date',
        'payment_method',
        'vendor_name',
        'receipt_number',
        'employee_name',
        'project_department',
        'approval_status',
        'expense_status',
        'notes',
        'group_id',
    ];

    protected $casts = [
        'group_id' => 'string',
    ];

    public function expensesType()
    {
        return $this->belongsTo(ExpensesType::class, 'expenses_type_id');
    }
}
