@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="card-title">{{ __('keyword.Add Expenses') }}</h1>
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
            <form action="{{ route('store-expenses') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-8">


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="expenses_type_id">{{ __('keyword.Expense Type') }}</label>
                                <select name="expenses_type_id" id="expenses_type_id" class="form-select">
                                    @foreach ($expensesTypes as $expenseType)
                                        <option value="{{ $expenseType->id }}">{{ $expenseType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="expenses_title">{{ __('keyword.Expenses Title') }}</label>
                                <input type="text" name="expenses_title" id="expenses_title" class="form-control">
                            </div>
                        </div>
                        

                        <!-- Expense Date -->
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="expense_date">{{ __('keyword.Issued Date') }}</label>
                                <input type="date" name="expense_date" id="expense_date" class="form-control">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="charges">{{ __('keyword.Additional Cost') }}</label>
                                <input type="number" name="charges" id="charges" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="period">{{ __('keyword.Period') }}</label>
                                <select name="period" id="period" class="form-select">
                                    <option value="yearly">Yearly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="on time">On Time</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="priority">{{ __('keyword.Priority') }}</label>
                                <select name="priority" id="priority" class="form-select">
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Approval Status -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="approval_status">{{ __('keyword.Approval Status') }}</label>
                        <select name="approval_status" id="approval_status" class="form-select">
                            <option value="0">Pending</option>
                            <option value="1">Approved</option>
                            <option value="2">Rejected</option>
                        </select>
                    </div>
                </div>

                <!-- Expenses Status -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="expense_status">{{ __('keyword.Expenses Status') }}</label>
                        <select name="expense_status" id="expense_status" class="form-select">
                            <option value="0">Paid</option>
                            <option value="1">Pending</option>
                            <option value="2">Upcoming</option>
                        </select>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="payment_method">{{ __('keyword.Payment Method') }}</label>
                        <select name="payment_method" id="payment_method" class="form-select">
                            <option value="cash">Cash</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>


                <!-- Payment installment -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label>{{ __('keyword.Payment Installment?') }}</label><br>
                        <input type="radio" id="is_installment_yes" name="is_installment" value="1">
                        <label for="is_installment_yes">Yes</label><br>
                        <input type="radio" id="is_installment_no" name="is_installment" value="0">
                        <label for="is_installment_no">No</label><br>
                    </div>
                </div>

                <!-- Installment details -->
                <div class="mb-3 row" id="installmentDetails" style="display: none;">
                    <div class="col-md-6">
                        <label for="installment_count">{{ __('keyword.Number of Installments') }}</label>
                        <input type="number" name="installment_count" id="installment_count" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="due_date">{{ __('keyword.Installment Due Date') }}</label>
                        <input type="date" name="due_date" id="due_date" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="installment_amount">{{ __('keyword.Installment Amount') }}</label>
                        <input type="number" name="installment_amount" id="installment_amount" class="form-control">
                    </div>
                </div>

                <!-- Amount -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="amount">{{ __('keyword.Amount') }}</label>
                        <input type="number" name="amount" id="amount" class="form-control">
                    </div>
                </div>


                <!-- Description -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="description">{{ __('keyword.Description') }}</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                </div>

                <!-- Vendor/Supplier Name -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="vendor_name">{{ __('keyword.Vendor/Supplier Name') }}</label>
                        <input type="text" name="vendor_name" id="vendor_name" class="form-control">
                    </div>
                </div>

                <!-- Receipt Number/Reference -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="receipt_number">{{ __('keyword.Receipt Number/Reference') }}</label>
                        <input type="text" name="receipt_number" id="receipt_number" class="form-control">
                    </div>
                </div>

                <!-- Employee Name/ID -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="employee_name">{{ __('keyword.Employee Name/ID') }}</label>
                        <input type="text" name="employee_name" id="employee_name" class="form-control">
                    </div>
                </div>

                <!-- Project/Department -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="project_department">{{ __('keyword.Issued By') }}</label>
                        <input type="text" name="project_department" id="project_department" class="form-control">
                    </div>
                </div>

                <!-- Notes -->
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="notes">{{ __('keyword.Notes') }}</label>
                        <textarea name="notes" id="notes" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">{{ __('keyword.Save') }}</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>

<script>
    function calculateAmount() {
        const isInstallment = document.querySelector('input[name="is_installment"]:checked');
        const amountField = document.getElementById('amount');
        const installmentAmountField = document.getElementById('installment_amount');
        const installmentCountField = document.getElementById('installment_count');

        if (isInstallment && isInstallment.value === '1') {
            // Payment is installment
            const installmentAmount = parseFloat(installmentAmountField.value);
            const installmentCount = parseFloat(installmentCountField.value);
            const calculatedAmount = installmentAmount * installmentCount;
            amountField.value = calculatedAmount.toFixed(2);
        } else {
            amountField.value = parseFloat(amountField.value).toFixed(2);
        }
    }

    document.getElementById('installment_amount').addEventListener('input', calculateAmount);
    document.getElementById('installment_count').addEventListener('input', calculateAmount);

    // Show/hide installment details based on the radio button selection
    const installmentRadioYes = document.getElementById('is_installment_yes');
    installmentRadioYes.addEventListener('change', function () {
        document.getElementById('installmentDetails').style.display = 'block';
        calculateAmount(); // Call the calculation function when user selects installment
    });

    const installmentRadioNo = document.getElementById('is_installment_no');
    installmentRadioNo.addEventListener('change', function () {
        document.getElementById('installmentDetails').style.display = 'none';
        calculateAmount(); // Call the calculation function when user deselects installment
    });
</script>

@endsection







