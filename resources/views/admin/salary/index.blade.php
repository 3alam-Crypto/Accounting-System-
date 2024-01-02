@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Salaries</h3>
                            <!--begin::Primary button-->
                           
                            
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table id="kt_table_users" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Employee</th>
                                    <th>Status</th>
                                    <th>Payout Date</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($firstSalaries as $salary)
                                    <tr>
                                        <td>{{ $salary->id }}</td>
                                        <td>{{ $salary->employee->first_name }} {{ $salary->employee->last_name }}</td>
                                        <td>
                                            <input type="checkbox" class="status-checkbox" data-salary-id="{{ $salary->id }}" {{ $salary->status ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ $salary->payout_date }}</td>
                                        <td>{{ $salary->amount }}</td>
                                        <td class="text-center">
                                            <a
                                                href="#"
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                            </a>
                                            <!--begin::Menu-->
                                            <div
                                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('view-salaries', ['employee_id' => $salary->employee_id]) }}" class="menu-link px-3">View</a>
                                                </div>
        
                                            </div>
                                            <!--end::Menu-->
                                        </td>
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

<script>
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


</script>

@endsection
@section('javascript')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables JS -->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        // Initialize the DataTable
        $(document).ready(function() {
            $('#kt_table_users').DataTable();
        });
    </script>
@endsection
