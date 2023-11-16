@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Sales File Type</h3>
                            <!--begin::Primary button-->
                            <a href="{{ route('create-saleFileType') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add File Type</a>
                            <!--end::Primary button-->
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salesFileTypes as $salesFileType)
                                <tr>
                                    <td>{{ $salesFileType->name }}</td>
                                    <td style="display: flex; align-items: center;">
                                        <a href="{{ route('edit-saleFileType', $salesFileType->id) }}" class="btn btn-success">Edit</a>
                                        <form method="POST" action="{{ route('delete-saleFileType', $salesFileType->id) }}" onsubmit="return confirm('Are you sure?');">
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
@endsection
