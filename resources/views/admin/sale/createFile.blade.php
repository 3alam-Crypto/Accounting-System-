@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Upload Files for Sale ID: {{ $sale->id }}</h1>
    <form action="{{ route('storeFile-sale', ['sale' => $sale->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 row">
            <div class="col-md-3">
                <label for="salesFileType">Select Sales File Type:</label>
                <select name="salesFileType" id="salesFileType" class="form-control">
                    @foreach($salesFileTypes as $salesFileType)
                    <option value="{{ $salesFileType->id }}">{{ $salesFileType->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-md-3">
                <label for="fileUpload">Upload File:</label>
                <input type="file" name="fileUpload" id="fileUpload" class="form-control">
                <small class="text-danger">File type can be uploaded (IMG - PDF - Word - Excel)</small> 
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
