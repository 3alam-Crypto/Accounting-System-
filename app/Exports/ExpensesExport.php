<?php

namespace App\Exports;

use App\Models\Expenses;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExpensesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Expenses::with('expensesType')->get();
    }

    public function headings(): array
    {
        return [
            'Expenses Type Name',
            'Installment Amount',
            'Installment Count',
            'Amount',
            'Status',
            'Due Date',
            'Paid Date',
            'Charges',
            'Due Charges',
            'Period',
            'Priority',
            'Group ID',
        ];
    }

    public function map($expense): array
    {
        return [
            $expense->expensesType->name ?? '',
            $expense->installment_amount,
            $expense->installment_count,
            $expense->amount,
            $expense->status,
            $expense->due_date,
            $expense->paid_date,
            $expense->charges,
            $expense->due_charges,
            $expense->period,
            $expense->priority,
            $expense->group_id,
        ];
    }
}
