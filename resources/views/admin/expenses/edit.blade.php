@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="">Edit Expense</h1>
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
                                    <label for="expenses_type_id">Expense Type</label>
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
                                    <label for="charges">Charges</label>
                                    <input type="number" name="charges" id="charges" class="form-control" value="{{ $expenses->charges}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="due_charges">Due Charges</label>
                                    <input type="number" name="due_charges" id="due_charges" class="form-control" value="{{ $expenses->due_charges}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="priority">Priority</label>
                                    <select name="priority" id="priority" class="form-select">
                                        <option value="High" {{ $expenses->priority === 'High' ? 'selected' : '' }}>High</option>
                                        <option value="Medium" {{ $expenses->priority === 'Medium' ? 'selected' : '' }}>Medium</option>
                                        <option value="Low" {{ $expenses->priority === 'Low' ? 'selected' : '' }}>Low</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Expense</button>
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
            document.getElementById('hidden_amount').value = amount.toFixed(2);
        }
    </script>

@endsection
