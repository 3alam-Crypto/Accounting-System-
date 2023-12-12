@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Loans</h3>
                            <!--begin::Primary button-->
                            <a href="{{ route('create-expenses') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Loans</a>
                            <!--end::Primary button-->
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
                                    <td style="display: flex; align-items: center;">
                                        <a href="{{ route('edit-expenses', $expense->id) }}" class="btn btn-success">Edit</a>
                                        <form method="POST" action="{{ route('delete-expenses', $expense->id) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="margin-left: 10px;">Delete</button>
                                        </form>
                                        <a href="{{ route('view-expenses', ['group_id' => $expense->group_id]) }}" class="btn btn-success" style="margin-left: 10px;">View</a>
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
