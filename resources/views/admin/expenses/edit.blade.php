@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="card-title">{{ __('keyword.Edit Expenses') }}</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('update-expenses', ['expenses' => $expenses->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="expenses_type_id">{{ __('keyword.Expense Type') }}</label>
                                    <select name="expenses_type_id" id="expenses_type_id" class="form-select">
                                        @foreach ($expensesTypes as $expenseType)
                                            <option value="{{ $expenseType->id }}"
                                                {{ $expenseType->id === $expenses->expenses_type_id ? 'selected' : '' }}>
                                                {{ $expenseType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="expenses_title">{{ __('keyword.Expenses Title') }}</label>
                                    <input type="text" name="expenses_title" id="expenses_title" class="form-control" value="{{ $expenses->expenses_title }}">
                                </div>
                            </div>

                            <!-- Expense Date -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="expense_date">{{ __('keyword.Issued Date') }}</label>
                                    <input type="date" name="expense_date" id="expense_date" class="form-control" value="{{ $expenses->expense_date }}">
                                </div>
                            </div>

                            <!-- Charges -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="charges">{{ __('keyword.Additional Cost') }}</label>
                                    <input type="number" name="charges" id="charges" class="form-control" value="{{ $expenses->charges}}">
                                </div>
                            </div>


                            <!-- Priority -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="priority">{{ __('keyword.Priority') }}</label>
                                    <select name="priority" id="priority" class="form-select">
                                        <option value="High" {{ $expenses->priority === 'High' ? 'selected' : '' }}>High</option>
                                        <option value="Medium" {{ $expenses->priority === 'Medium' ? 'selected' : '' }}>Medium</option>
                                        <option value="Low" {{ $expenses->priority === 'Low' ? 'selected' : '' }}>Low</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Approval Status -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="approval_status">{{ __('keyword.Approval Status') }}</label>
                                    <select name="approval_status" id="approval_status" class="form-select">
                                        <option value="0" {{ $expenses->approval_status === 0 ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ $expenses->approval_status === 1 ? 'selected' : '' }}>Approved</option>
                                        <option value="2" {{ $expenses->approval_status === 2 ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Expense Status -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="expense_status">{{ __('keyword.Expenses Status') }}</label>
                                    <select name="expense_status" id="expense_status" class="form-select">
                                        <option value="0" {{ $expenses->expense_status === 0 ? 'selected' : '' }}>Paid</option>
                                        <option value="1" {{ $expenses->expense_status === 1 ? 'selected' : '' }}>Pending</option>
                                        <option value="2" {{ $expenses->expense_status === 2 ? 'selected' : '' }}>Upcoming</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="payment_method">{{ __('keyword.Payment Method') }}</label>
                                    <select name="payment_method" id="payment_method" class="form-select">
                                        <option value="cash" {{ $expenses->payment_method === 'cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="credit_card" {{ $expenses->payment_method === 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                                        <option value="bank_transfer" {{ $expenses->payment_method === 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>

                            <!-- Payment installment -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label>{{ __('keyword.Payment Installment?') }}</label><br>
                                    <input type="radio" id="is_installment_yes" name="is_installment" value="1" {{ $expenses->is_installment === 1 ? 'checked' : '' }}>
                                    <label for="is_installment_yes">Yes</label><br>
                                    <input type="radio" id="is_installment_no" name="is_installment" value="0" {{ $expenses->is_installment === 0 ? 'checked' : '' }}>
                                    <label for="is_installment_no">No</label><br>
                                </div>
                            </div>

                            <!-- Installment details -->
                            <div class="mb-3 row" id="installmentDetails" style="{{ $expenses->is_installment ? 'display:block' : 'display:none' }}">
                                <div class="col-md-6">
                                    <label for="installment_count">{{ __('keyword.Number of Installments') }}</label>
                                    <input type="number" name="installment_count" id="installment_count" class="form-control" value="{{ $expenses->installment_count}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="due_date">{{ __('keyword.Installment Due Date') }}</label>
                                    <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $expenses->due_date }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="installment_amount">{{ __('keyword.Installment Amount') }}</label>
                                    <input type="number" name="installment_amount" id="installment_amount" class="form-control" value="{{ $expenses->installment_amount }}">
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="amount">{{ __('keyword.Amount') }}</label>
                                    <input type="number" name="amount" id="amount" class="form-control" value="{{ $expenses->amount }}">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="description">{{ __('keyword.Description') }}</label>
                                    <textarea name="description" id="description" class="form-control">{{ $expenses->description }}</textarea>
                                </div>
                            </div>

                            <!-- Vendor/Supplier Name -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="vendor_name">{{ __('keyword.Vendor/Supplier Name') }}</label>
                                    <input type="text" name="vendor_name" id="vendor_name" class="form-control" value="{{ $expenses->vendor_name }}">
                                </div>
                            </div>

                            <!-- Receipt Number/Reference -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="receipt_number">{{ __('keyword.Receipt Number/Reference') }}</label>
                                    <input type="text" name="receipt_number" id="receipt_number" class="form-control" value="{{ $expenses->receipt_number }}">
                                </div>
                            </div>

                            <!-- Employee Name/ID -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="employee_name">{{ __('keyword.Employee Name/ID') }}</label>
                                    <input type="text" name="employee_name" id="employee_name" class="form-control" value="{{ $expenses->employee_name }}">
                                </div>
                            </div>

                            <!-- Project/Department -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="project_department">{{ __('keyword.Issued By') }}</label>
                                    <input type="text" name="project_department" id="project_department" class="form-control" value="{{ $expenses->project_department }}">
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="notes">{{ __('keyword.Notes') }}</label>
                                    <textarea name="notes" id="notes" class="form-control">{{ $expenses->notes }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">{{ __('keyword.Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function calculateAmount() {
            const installmentAmount = parseFloat(document.getElementById('installment_amount').value);
            const installmentCount = parseFloat(document.getElementById('installment_count').value);
            const amount = installmentAmount * installmentCount;
            document.getElementById('amount').value = amount.toFixed(2);
        }

        function toggleInstallmentDetails() {
            const isInstallmentYes = document.getElementById('is_installment_yes');
            const installmentDetails = document.getElementById('installmentDetails');

            if (isInstallmentYes.checked) {
                installmentDetails.style.display = 'block';
                calculateAmount();
            } else {
                installmentDetails.style.display = 'none';
                calculateAmount();
            }
        }

        document.getElementById('is_installment_yes').addEventListener('change', toggleInstallmentDetails);
        document.getElementById('is_installment_no').addEventListener('change', toggleInstallmentDetails);

        document.getElementById('installment_amount').addEventListener('input', calculateAmount);
        document.getElementById('installment_count').addEventListener('input', calculateAmount);
    </script>
@endsection
