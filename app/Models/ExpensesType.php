<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesType extends Model
{
    use HasFactory;

    protected $table = 'expenses_types';

    protected $fillable = ['name', 'bounce', 'punishment'];

    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }
}
