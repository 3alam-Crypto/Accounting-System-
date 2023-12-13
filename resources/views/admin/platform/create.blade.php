@extends('layouts.master')

@section('content')
<div class="container">
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h3 class="card-title">Platform</h3>
                </div>

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('store-platform') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <div class="col-md-6">
                                <label>Platform Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="col-md-6">
                                <label>Pay out 1</label>
                                <input type="text" name="pay_out_1" class="form-control" {{ old('immediately') ? 'disabled' : '' }}>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="col-md-6">
                                <label>Pay out 2</label>
                                <input type="text" name="pay_out_2" class="form-control" {{ old('immediately') ? 'disabled' : '' }}>
                            </div>
                        </div>

                        <div class="form-check mb-3">
                            <div class="col-md-6">
                                <input class="form-check-input" type="checkbox" name="immediately" id="immediatelyCheckbox">
                                <label class="form-check-label" for="immediatelyCheckbox">
                                    immediately
                                </label>
                             </div>
                        </div>

                        <div class="mb-3">
                            <div class="col-md-6">
                                <label>Ship Date</label>
                                <input type="text" name="ship_date" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Save Platform</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const immediatelyCheckbox = document.getElementById('immediatelyCheckbox');
        const payOut1Input = document.querySelector('input[name="pay_out_1"]');
        const payOut2Input = document.querySelector('input[name="pay_out_2"]');
        
        immediatelyCheckbox.addEventListener('change', function () {
            payOut1Input.disabled = this.checked;
            payOut2Input.disabled = this.checked;
        });
    });
</script>

@endsection
