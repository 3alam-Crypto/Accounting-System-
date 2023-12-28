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
        $firstExpenses = Expenses::whereIn('id', function ($query) {
            $query->selectRaw('MIN(id)')
                ->from('expenses')
                ->groupBy('group_id');
        })->get();
    
        return view('admin.expenses.index', compact('firstExpenses'));
    }

    public function create()
    {
        $expensesTypes = ExpensesType::all();
        return view('admin.expenses.create', compact('expensesTypes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'expenses_type_id' => 'required',
            'installment_amount' => 'required|numeric',
            'installment_count' => 'required|integer|min:1',
            'due_date' => 'required|date',
            'charges' => 'required|numeric',
            'due_charges' => 'required|numeric',
            'period' => 'required|string|in:yearly,monthly,weekly,on time',
            'priority' => 'required|string|in:High,Medium,Low',
        ]);
        
        $maxGroupId = Expenses::max('group_id');
        $newGroupId = $maxGroupId + 1;
        
        if ($request->input('period') === 'on time') {
            $newExpense = [
                'expenses_type_id' => $request->input('expenses_type_id'),
                'installment_amount' => $request->input('installment_amount'),
                'installment_count' => 1, // Set to 1 for 'One Time'
                'amount' => $request->input('amount'),
                'charges' => $request->input('charges'),
                'due_charges' => $request->input('due_charges'),
                'period' => $request->input('period'),
                'priority' => $request->input('priority'),
                'due_date' => $request->input('due_date'),
                'group_id' => $newGroupId,
            ];
            
            Expenses::create($newExpense);
        } else {
            $installmentCount = $request->input('installment_count');
            $dueDate = new \DateTime($request->input('due_date'));
            
            for ($i = 0; $i < $installmentCount; $i++) {
                $newExpense = [
                    'expenses_type_id' => $request->input('expenses_type_id'),
                    'installment_amount' => $request->input('installment_amount'),
                    'installment_count' => $installmentCount,
                    'amount' => $request->input('amount'),
                    'charges' => $request->input('charges'),
                    'due_charges' => $request->input('due_charges'),
                    'period' => $request->input('period'),
                    'priority' => $request->input('priority'),
                    'group_id' => $newGroupId,
                ];
                
                if ($i === 0) {
                    $newExpense['due_date'] = $dueDate->format('Y-m-d');
                } else {
                    
                    if ($request->input('period') === 'yearly') {
                        $dueDate->add(new \DateInterval('P1Y'));
                    } elseif ($request->input('period') === 'monthly') {
                        $dueDate->add(new \DateInterval('P1M'));
                    } elseif ($request->input('period') === 'weekly') {
                        $dueDate->add(new \DateInterval('P7D'));
                    }
                    $newExpense['due_date'] = $dueDate->format('Y-m-d');
                }
                Expenses::create($newExpense);
            }
        }
        return redirect()->route('expenses')->with('success', 'Expenses added successfully.');
    }


    public function edit(Expenses $expenses)
    {
        $expensesTypes = ExpensesType::all();
        return view('admin.expenses.edit', compact('expenses', 'expensesTypes'));
    }

    public function update(Request $request, Expenses $expenses)
    {
        $request->validate([
            'expenses_type_id' => 'required',
            'charges' => 'required|numeric',
            'due_charges' => 'required|numeric',
            'period' => 'required|string',
            'priority' => 'required|string',
        ]);
        
        $expenses->update($request->all());
        
        return redirect()->route('expenses')->with('success', 'Expense updated successfully.');
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
