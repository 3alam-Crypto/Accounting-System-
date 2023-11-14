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
                            <a href="{{ route('create-expenses') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Expenses</a>
                            <!--end::Primary button-->
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
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
                                @foreach($expenses as $expense)
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
