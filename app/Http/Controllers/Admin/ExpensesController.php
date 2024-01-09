<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expenses;
use App\Models\ExpensesType;
use Illuminate\Http\Request;
use App\Exports\ExpensesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExpensesController extends Controller
{
    public function index()
    {
        $expenses = Expenses::all();
        
        return view('admin.expenses.index', ['expenses' => $expenses]);
    }

    public function create()
    {
        $expensesTypes = ExpensesType::all();
        return view('admin.expenses.create', compact('expensesTypes'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Add validation rules for each field here
            'expenses_type_id' => 'required|integer',
            'expenses_title' => 'required|string',
            'expense_date' => 'required|date',
            'charges' => 'nullable|numeric',
            'period' => 'required|string',
            'priority' => 'required|string',
            'approval_status' => 'required|integer',
            'expense_status' => 'required|integer',
            'payment_method' => 'required|string',
            'is_installment' => 'required|boolean',
            'installment_count' => 'nullable|required_if:is_installment,1|integer',
            'due_date' => 'nullable|required_if:is_installment,1|date',
            'installment_amount' => 'nullable|required_if:is_installment,1|numeric',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'vendor_name' => 'nullable|string',
            'receipt_number' => 'nullable|string',
            'employee_name' => 'nullable|string',
            'project_department' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
    
        
        $expense = new Expenses($validatedData);
        
        $expense->save();
    
        
        return redirect()->route('expenses')->with('success', 'Expense added successfully');
    }


    public function edit(Expenses $expenses)
    {
        $expensesTypes = ExpensesType::all();
        return view('admin.expenses.edit', compact('expenses', 'expensesTypes'));
    }

    public function update(Request $request, Expenses $expenses)
    {
        $validatedData = $request->validate([
            
            'expenses_type_id' => 'required',
            'expenses_title' => 'nullable|string',
            'installment_amount' => 'nullable|numeric',
            'installment_count' => 'nullable|integer',
            'amount' => 'nullable|numeric',
            'due_date' => 'nullable|date',
            'paid_date' => 'nullable|date',
            'charges' => 'nullable|numeric',
            'period' => 'nullable|string',
            'priority' => 'nullable|string',
            'expense_date' => 'nullable|date',
            'is_installment' => 'required|boolean',
            'description' => 'nullable|string',
            'payment_method' => 'nullable|string',
            'vendor_name' => 'nullable|string',
            'receipt_number' => 'nullable|string',
            'employee_name' => 'nullable|string',
            'project_department' => 'nullable|string',
            'approval_status' => 'required|integer',
            'expense_status' => 'required|integer',
            'notes' => 'nullable|string',
        ]);

        $expenses->update($validatedData);

        return redirect()->route('expenses')
            ->with('success', 'Expenses updated successfully');
    }

    public function updateStatus(Request $request)
    {
        $expense = Expenses::findOrFail($request->input('expense_id'));
        $isChecked = $request->input('status');
        
        if ($isChecked) {
            
            $expense->update([
                'status' => 1,
                'paid_date' => now()->toDateString()
            ]);
        
        } else {
            $expense->update([
                'status' => 0,
                'paid_date' => null
            ]);
        }
        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function destroy(Expenses $expenses)
    {
        $expenses->delete();

        return redirect()->route('expenses')->with('success', 'Expenses deleted successfully.');
    }

    public function view($groupId)
    {
        $groupExpenses = Expenses::where('group_id', $groupId)->get();
        
        return view('admin.expenses.view', compact('groupExpenses'));
    }

    public function export()
    {
        return Excel::download(new ExpensesExport(), 'expenses.xlsx');
    }

}
