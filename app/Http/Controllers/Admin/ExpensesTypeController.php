<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExpensesType;
use Illuminate\Http\Request;

class ExpensesTypeController extends Controller
{
    public function index()
    {
        $expensesType = ExpensesType::all();
        return view('admin.expensesType.index', compact('expensesType'));
    }

    public function create()
    {
        $expensesType = ExpensesType::all();
        return view('admin.expensesType.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        ExpensesType::create($request->all());

        return redirect()->route('expensesType')->with('success', 'Expenses type added successfully.');
    }

    public function edit(ExpensesType $expensesType)
    {
        return view('admin.expensesType.edit', compact('expensesType'));
    }

    public function update(Request $request, ExpensesType $expensesType)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $expensesType->update($request->all());

        return redirect()->route('expensesType')->with('success', 'Expenses type updated successfully.');
    }

    public function destroy(ExpensesType $expensesType)
    {
        $expensesType->delete();

        return redirect()->route('expensesType')->with('success', 'Expenses type deleted successfully.');
    }

    public function view(ExpensesType $expensesType)
{
    $expenses = $expensesType->expenses()->get();
    return view('admin.expensesType.view', compact('expensesType', 'expenses'));
}
}
