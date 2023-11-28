@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">Platform</h3>
                            
                            <a href="{{ route('create-platform') }}" class="btn btn-sm fw-bold btn-primary px-4 py-2">Add Platform</a>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table id="myDataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Immediately</th>
                                    <th>Pay Out 1</th>
                                    <th>Pay Out 2</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($platforms as $platform)
                                <tr>
                                    <td>{{ $platform->id }}</td>
                                    <td>{{ $platform->name }}</td>
                                    <td>{{ $platform->immediately ? 'Yes' : 'No' }}</td>
                                    <td>{{ $platform->pay_out_1 ?? 'null' }}</td>
                                    <td>{{ $platform->pay_out_2 ?? 'null' }}</td>
                                    <td style="display: flex; align-items: center;">
                                        <a href="{{ route('edit-platform', ['platform' => $platform->id]) }}" class="btn btn-success space">Edit</a>

                                        <form method="POST" action="{{ route('delete-platform', $platform->id) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger space">Delete</button>
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
