@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Expenses</h3>
                            <!--begin::Primary button-->
                           
                            <!--end::Primary button-->
                            <div class="d-flex flex-nowrap">
                                <a href="{{ route('create-expenses') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Expenses</a>
                                <a href="{{ route('export-expenses') }}"
                                    class="btn btn-sm fw-bold btn-primary px-4 py-2">Export</a>
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table id="kt_table_users" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Expense Type</th>
                                    <th>Installment Amount</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Paid Date</th>
                                    <th>Charges</th>
                                    <th>Due Charges</th>
                                    <th>Period</th>
                                    <th>Priority</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($firstExpenses as $expense)
                                <tr>
                                    <td>{{ $expense->expensesType->name }}</td>
                                    <td>{{ $expense->installment_amount }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>
                                        <input type="checkbox" class="status-checkbox" data-expense-id="{{ $expense->id }}" {{ $expense->status ? 'checked' : '' }}>
                                    </td>
                                    <td>{{ $expense->due_date }}</td>
                                    <td>{{ $expense->paid_date }}</td>
                                    <td>{{ $expense->charges }}</td>
                                    <td>{{ $expense->due_charges }}</td>
                                    <td>{{ $expense->period }}</td>
                                    <td>{{ $expense->priority }}</td>
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
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a
                                                    href="{{ route('edit-expenses', $expense->id) }}"
                                                    class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a
                                                    href="{{ route('view-expenses', ['group_id' => $expense->group_id]) }}"
                                                    class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!-- Update Delete section -->
                                            <div class="menu-item px-3">
                                                <a
                                                    href="{{ route('delete-expenses', $expense->id) }}"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this expenses type?')) { document.getElementById('delete-form-{{ $expense->id}}').submit(); }"
                                                    class="menu-link px-3">Delete</a>
                                                <form
                                                    id="delete-form-{{ $expense->id }}"
                                                    method="POST"
                                                    action="{{ route('delete-expenses', $expense->id) }}"
                                                    style="display: none;">
                                                    @csrf @method('DELETE')
                                                </form>
                                            </div>
                                            <!-- View section -->
    
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
        const expenseId = this.getAttribute('data-expense-id');
        const isChecked = this.checked;

        fetch(`{{ route('update-expense-status') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                expense_id: expenseId,
                status: isChecked ? 1 : 0
            })
        })
        .then(response => {
            if (response.ok) {
                console.log('Status updated successfully');
                
                const currentDate = new Date().toISOString().split('T')[0];
                const paidDateColumn = this.parentNode.nextElementSibling.nextElementSibling;
                if (isChecked) {
                    paidDateColumn.textContent = currentDate;
                } else {
                    paidDateColumn.textContent = '';
                }
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
