<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone',
        'email',
        'salary',
        'start_date',
        'payout_date',
        'birthdate',
        'country_id',
        'department',
        'id_number',
        'id_file',
        'citizen',
        'contract_end_date',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
