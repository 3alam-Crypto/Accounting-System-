<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $firstSalaries = Salary::whereIn('id', function ($query) {
            $query->selectRaw('MIN(id)')
                ->from('salaries')
                ->groupBy('employee_id'); // Assuming you want to group by employee
        })->with('employee')->get();
        
        return view('admin.salary.index', compact('firstSalaries'));
    }

    public function updateStatus(Request $request)
    {
        $salaryId = $request->input('salary_id');
        $status = $request->input('status');

        $salary = Salary::findOrFail($salaryId);
        $salary->status = $status;
        $salary->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function createSalariesForEmployee(Employee $employee)
    {
        $startDate = $employee->start_date;
        $contractEndDate = $employee->contract_end_date;
        $amount = $employee->salary; // Fetch 'amount' from the 'salary' field in the Employee model

        $startDateTime = new \DateTime($startDate);
        $contractEndDateTime = new \DateTime($contractEndDate);

        $interval = $startDateTime->diff($contractEndDateTime);
        $monthsDifference = $interval->m + ($interval->y * 12);

        $currentPayoutDate = $startDateTime; // Initialize payout date with the start_date

        for ($i = 0; $i <= $monthsDifference; $i++) {
            $salary = new Salary();
            $salary->employee_id = $employee->id;
            $salary->status = 0; // Assuming default status is pending
            $salary->payout_date = $currentPayoutDate->format('Y-m-d');
            $salary->amount = $amount; // Set 'amount' fetched from the Employee model

            $salary->save();

            // Add a month to the current payout date for the next iteration
            $currentPayoutDate->add(new \DateInterval('P1M'));
        }

        return response()->json(['message' => 'Salaries created successfully']);
    }

    public function view($employeeId)
    {
        $employeeSalaries = Salary::where('employee_id', $employeeId)->get();
    
        return view('admin.salary.view', compact('employeeSalaries'));
    }


}
