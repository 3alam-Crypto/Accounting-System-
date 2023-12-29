@extends('layouts.master')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="card-title">Edit Loan</h1>
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
                <form action="{{ route('update-loan', ['loan' => $loan->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="loan_type_id">Loan Type</label>
                                    <select name="loan_type_id" id="loan_type_id" class="form-select">
                                        @foreach ($loanTypes as $loanType)
                                            <option value="{{ $loanType->id }}"
                                                {{ $loanType->id === $loan->loan_type_id ? 'selected' : '' }}>
                                                {{ $loanType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="charges">Charges</label>
                                    <input type="number" name="charges" id="charges" class="form-control" value="{{ $loan->charges}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="due_charges">Due Charges</label>
                                    <input type="number" name="due_charges" id="due_charges" class="form-control" value="{{ $loan->due_charges}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="priority">Priority</label>
                                    <select name="priority" id="priority" class="form-select">
                                        <option value="High" {{ $loan->priority === 'High' ? 'selected' : '' }}>High</option>
                                        <option value="Medium" {{ $loan->priority === 'Medium' ? 'selected' : '' }}>Medium</option>
                                        <option value="Low" {{ $loan->priority === 'Low' ? 'selected' : '' }}>Low</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Loan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
