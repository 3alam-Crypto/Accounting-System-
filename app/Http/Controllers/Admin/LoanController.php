<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\LoanType;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LoansExport;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $firstLoans = Loan::whereIn('id', function ($query) {
            $query->selectRaw('MIN(id)')
                ->from('loans')
                ->groupBy('group_id');
        })->get();
    
        return view('admin.loan.index', compact('firstLoans'));
    }

    public function create()
    {
        $loanTypes = LoanType::all();
        return view('admin.loan.create', compact('loanTypes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'loan_type_id' => 'required',
            'installment_amount' => 'required|numeric',
            'installment_count' => 'required|integer|min:1',
            'due_date' => 'required|date',
            'charges' => 'required|numeric',
            'due_charges' => 'required|numeric',
            'period' => 'required|string|in:yearly,monthly,weekly,on time',
            'priority' => 'required|string|in:High,Medium,Low',
        ]);
        
        $maxGroupId = Loan::max('group_id');
        $newGroupId = $maxGroupId + 1;
        
        if ($request->input('period') === 'on time') {
            $newLoan = [
                'loan_type_id' => $request->input('loan_type_id'),
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
            
            Loan::create($newLoan);
        } else {
            $installmentCount = $request->input('installment_count');
            $dueDate = new \DateTime($request->input('due_date'));
            
            for ($i = 0; $i < $installmentCount; $i++) {
                $newLoan = [
                    'loan_type_id' => $request->input('loan_type_id'),
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
                    $newLoan['due_date'] = $dueDate->format('Y-m-d');
                } else {
                    if ($request->input('period') === 'yearly') {
                        $dueDate->add(new \DateInterval('P1Y'));
                    } elseif ($request->input('period') === 'monthly') {
                        $dueDate->add(new \DateInterval('P1M'));
                    } elseif ($request->input('period') === 'weekly') {
                        $dueDate->add(new \DateInterval('P7D'));
                    }
                    $newLoan['due_date'] = $dueDate->format('Y-m-d');
                }
                Loan::create($newLoan);
            }
        }
        return redirect()->route('loans')->with('success', 'Loans added successfully.');
    }


    public function edit(Loan $loan)
    {
        $loanTypes = LoanType::all();
        return view('admin.loan.edit', compact('loan', 'loanTypes'));
    }

    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'loan_type_id' => 'required',
            'charges' => 'required|numeric',
            'due_charges' => 'required|numeric',
            'priority' => 'required|string',
        ]);
        
        $loan->update($request->all());
        
        return redirect()->route('loans')->with('success', 'Loan updated successfully.');
    }

    public function updateStatus(Request $request)
    {
        $loan = Loan::findOrFail($request->input('loan_id'));
        $isChecked = $request->input('status');
        
        if ($isChecked) {
            $loan->update([
                'status' => 1,
                'paid_date' => now()->toDateString()
            ]);
        
        } else {
            $loan->update([
                'status' => 0,
                'paid_date' => null
            ]);
        }
        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect()->route('loans')->with('success', 'Loan deleted successfully.');
    }

    public function view($groupId)
    {
        $groupLoans = Loan::where('group_id', $groupId)->get();
        
        return view('admin.loan.view', compact('groupLoans'));
    }

    public function export()
    {
        return Excel::download(new LoansExport(), 'loans.xlsx');
    }
}
