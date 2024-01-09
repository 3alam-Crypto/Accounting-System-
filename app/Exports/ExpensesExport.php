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
            'Expenses Title',
            'Installment Amount',
            'Installment Count',
            'Amount',
            'Due Date',
            'Paid Date',
            'Charges',
            'Due Charges',
            'Period',
            'Priority',
            'Description',
            'Is Installment',
            'Expense Date',
            'Payment Method',
            'Vendor Name',
            'Receipt Number',
            'Employee Name',
            'Project Department',
            'Approval Status',
            'Expense Status',
            'Notes',
        ];
    }

    public function map($expense): array
    {
        return [
            $expense->expenses_title,
            $expense->installment_amount,
            $expense->installment_count,
            $expense->amount,
            $expense->due_date,
            $expense->paid_date,
            $expense->charges,
            $expense->due_charges,
            $expense->period,
            $expense->priority,
            $expense->description,
            $expense->is_installment ? 'Yes' : 'No',
            $expense->expense_date,
            $expense->payment_method,
            $expense->vendor_name,
            $expense->receipt_number,
            $expense->employee_name,
            $expense->project_department,
            $expense->approval_status === 0 ? 'Pending' : ($expense->approval_status === 1 ? 'Approved' : 'Rejected'),
            $expense->expense_status === 0 ? 'Paid' : ($expense->expense_status === 1 ? 'Pending' : 'Upcoming'),
            $expense->notes,
        ];
    }
}
