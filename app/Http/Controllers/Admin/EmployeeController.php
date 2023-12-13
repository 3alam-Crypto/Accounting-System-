<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employee.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:employees',
            'salary' => 'required|numeric',
            'start_date' => 'required|date',
            'payout_date' => 'required|integer',
            'birthdate' => 'required|date',
        ]);

        Employee::create($validatedData);

        return redirect()->route('employee')->with('success', 'Employee created successfully');
    }

    public function edit(Employee $employee)
    {
        return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:employees,email,' . $employee->id,
            'salary' => 'required|numeric',
            'start_date' => 'required|date',
            'payout_date' => 'required|integer',
            'birthdate' => 'required|date',
        ]);

        $employee->update($validatedData);

        return redirect()->route('employee')->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee')->with('success', 'Employee deleted successfully');
    }
}
