<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'loan_type_id',
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

    protected $casts = [
        'group_id' => 'string',
    ];

    public function loanType()
    {
        return $this->belongsTo(LoanType::class, 'loan_type_id');
    }
}
