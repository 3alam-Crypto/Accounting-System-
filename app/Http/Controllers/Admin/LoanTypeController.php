<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanType;
use Illuminate\Http\Request;

class LoanTypeController extends Controller
{
    public function index()
    {
        $loanTypes = LoanType::all();
        return view('admin.loanType.index', compact('loanTypes'));
    }

    public function create()
    {
        return view('admin.loanType.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'bounce' => 'nullable|string',
            'punishment' => 'nullable|string'
        ]);

        LoanType::create($request->all());

        return redirect()->route('loanTypes')->with('success', 'Loan type added successfully.');
    }

    public function edit(LoanType $loanType)
    {
        return view('admin.loanType.edit', compact('loanType'));
    }

    public function update(Request $request, LoanType $loanType)
    {
        $request->validate([
            'name' => 'required|string',
            'bounce' => 'nullable|string',
            'punishment' => 'nullable|string'
        ]);

        $loanType->update($request->all());

        return redirect()->route('loanTypes')->with('success', 'Loan type updated successfully.');
    }

    public function destroy(LoanType $loanType)
    {
        $loanType->delete();

        return redirect()->route('loanTypes')->with('success', 'Loan type deleted successfully.');
    }

    public function view(LoanType $loanType)
    {
        $loans = $loanType->loans()->get(); 
        
        return view('admin.loanType.view', compact('loanType', 'loans'));
    }

}
