@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Expenses Type</h3>
                            <a href="{{ route('create-expenses-type') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Expenses Type</a>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table id="myDataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Bounce</th>
                                    <th>Punishment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expensesType as $expenses_type)
                                <tr>
                                    <td>{{ $expenses_type->name }}</td>
                                    <td>{{ $expenses_type->bounce }}</td>
                                    <td>{{ $expenses_type->punishment }}</td>
                                    <td style="display: flex; align-items: center;">
                                        <a href="{{ route('edit-expenses-type', $expenses_type->id) }}" class="btn btn-success">Edit</a>
                                        <form method="POST" action="{{ route('delete-expenses-type', $expenses_type->id) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="margin-left: 10px;">Delete</button>
                                        </form>
                                        <a href="{{ route('view-expenses-type', $expenses_type->id) }}" class="btn btn-success" style="margin-left: 10px;">View</a>
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
@endsection
