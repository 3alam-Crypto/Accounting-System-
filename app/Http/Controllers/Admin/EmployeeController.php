<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Country;
use App\Models\Salary;
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
        $countries = Country::all();
        return view('admin.employee.create', compact('countries'));
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
            'id_file' => 'nullable|max:2048',
            'country_id' => 'nullable|exists:countries,id',
            'department' => 'nullable|string',
            'id_number' => 'nullable|string',
            'citizen' => 'nullable|string',
            'contract_end_date' => 'nullable|date',
        ]);
    
    
        $countryId = $request->input('country_id');
        // Create the employee record
        $employee = Employee::create($validatedData);
        
        if ($request->hasFile('id_file') && $request->file('id_file')->isValid()) {
            $file = $request->file('id_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('employee_files'), $fileName);
    
            // Save the file details to the employees table
            $fileUrl = asset('employee_files/' . $fileName);
            $employee->id_file = $fileUrl;
            $employee->save();
        }

        app(SalaryController::class)->createSalariesForEmployee($employee);

    
        return redirect()->route('employee')->with('success', 'Employee created successfully');
    }

    public function edit(Employee $employee)
    {
        $countries = Country::all();

        return view('admin.employee.edit', compact('employee', 'countries'));
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
            'id_file' => 'nullable|max:2048',
            'country_id' => 'nullable|exists:countries,id',
            'department' => 'nullable|string',
            'id_number' => 'nullable|string',
            'citizen' => 'nullable|string',
            'contract_end_date' => 'nullable|date',
        ]);
    
        $employee->update($validatedData);
    
        if ($request->hasFile('id_file') && $request->file('id_file')->isValid()) {
            $file = $request->file('id_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('employee_files'), $fileName);
    
            $fileUrl = asset('employee_files/' . $fileName);
            $employee->id_file = $fileUrl;
            $employee->save();
        }
    
        return redirect()->route('employee')->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->salaries()->delete();

        $employee->delete();

        return redirect()->route('employee')->with('success', 'Employee and related salaries deleted successfully');
    }
}
