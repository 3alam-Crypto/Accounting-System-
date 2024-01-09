@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <h3 class="card-title">{{ __('keyword.Employee Salaries') }}</h3>
                        <table id="kt_table_users" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('keyword.ID Salaries') }}</th>
                                    <th>{{ __('keyword.Employee') }}</th>
                                    <th>{{ __('keyword.Status') }}</th>
                                    <th>{{ __('keyword.Payout Date') }}</th>
                                    <th>{{ __('keyword.Amount') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employeeSalaries as $salary)
                                    <tr>
                                        <td>{{ $salary->id }}</td>
                                        <td>{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</td>
                                        <td>
                                            <input type="checkbox" class="status-checkbox" data-salary-id="{{ $salary->id }}" {{ $salary->status ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ $salary->payout_date }}</td>
                                        <td>{{ $salary->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables JS -->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        // JavaScript logic for updating salary status
        document.querySelectorAll('.status-checkbox').forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                const isChecked = this.checked;
                const salaryId = this.getAttribute('data-salary-id');
        
                fetch(`{{ route('update-salary-status') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        salary_id: salaryId,
                        status: isChecked ? 1 : 0
                    })
                })
                .then(response => {
                    if (response.ok) {
                        console.log('Status updated successfully');
                        // Handle UI update if needed
                    } else {
                        console.error('Failed to update status');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    
        // Initialize the DataTable
        $(document).ready(function() {
            $('#kt_table_users').DataTable();
        });
    </script>
@endsection
