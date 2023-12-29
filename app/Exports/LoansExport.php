<?php

namespace App\Exports;

use App\Models\Loan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LoansExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Loan::with('loanType')->get();
    }

    public function headings(): array
    {
        return [
            'Loan Type Name',
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

    public function map($loan): array
    {
        return [
            $loan->loanType->name ?? '',
            $loan->installment_amount,
            $loan->installment_count,
            $loan->amount,
            $loan->status,
            $loan->due_date,
            $loan->paid_date,
            $loan->charges,
            $loan->due_charges,
            $loan->period,
            $loan->priority,
            $loan->group_id,
        ];
    }
}
