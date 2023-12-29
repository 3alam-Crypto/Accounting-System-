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
                            <a href="{{ route('create-loan') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Loan</a>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Loan Type</th>
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
                                @foreach($groupLoans as $loan)
                                <tr>
                                    <td>{{ $loan->loanType->name }}</td>
                                    <td>{{ $loan->installment_amount }}</td>
                                    <td>{{ $loan->amount }}</td>
                                    <td>
                                        <input type="checkbox" class="status-checkbox" data-loan-id="{{ $loan->id }}" {{ $loan->status ? 'checked' : '' }}>
                                    </td>
                                    <td>{{ $loan->due_date }}</td>
                                    <td>{{ $loan->paid_date }}</td>
                                    <td>{{ $loan->charges }}</td>
                                    <td>{{ $loan->due_charges }}</td>
                                    <td>{{ $loan->period }}</td>
                                    <td>{{ $loan->priority }}</td>
                                    
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
                                                <a href="{{ route('edit-loan', $loan->id) }}" class="menu-link px-3">Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="{{ route('delete-loan', $loan->id) }}"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this loan?')) { document.getElementById('delete-form-{{ $loan->id }}').submit(); }"
                                                    class="menu-link px-3">Delete</a>
                                                <form id="delete-form-{{ $loan->id }}" method="POST" action="{{ route('delete-loan', $loan->id) }}" style="display: none;">
                                                    @csrf @method('DELETE')
                                                </form>
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
        const loanId = this.getAttribute('data-loan-id');
        const isChecked = this.checked;

        fetch(`{{ route('update-loan-status') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                loan_id: loanId,
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
