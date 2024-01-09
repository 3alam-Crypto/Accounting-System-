@extends('layouts.master')

@section('content')

<div class="container">
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="card-title">{{ __('Saleword.Sales') }}</h3>
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <input type="text" data-kt-docs-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-15"
                                    placeholder="Search Customers" />
                            </div>
                            <!--begin::Primary button-->
                            
                            <div class="d-flex flex-nowrap">
                                <a href="{{ route('create-sale') }}"
                                    class="btn btn-sm fw-bold btn-primary px-4 py-2 me-2">Add Sale</a>
                                <a href="{{ route('export-sale') }}"
                                    class="btn btn-sm fw-bold btn-primary px-4 py-2">Export</a>
                            </div>
                                
                            <!--end::Primary button-->
                        </div>
                        

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table id="kt_table_users" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr>
                                    <th class="min-w-125px">{{ __('Saleword.Shipping Date') }}</th>
                                    <th class="min-w-125px">{{ __('Saleword.Our Order') }} </th>
                                    <th class="min-w-125px">{{ __('Saleword.Order Date') }}</th>
                                    <th class="min-w-125px">{{ __('Saleword.Customer Name') }}</th>
                                    <th class="min-w-125px">{{ __('Saleword.Product Name') }}</th>
                                    <th class="min-w-125px">{{ __('Saleword.Product Model') }}</th>
                                    <th class="min-w-125px">{{ __('Saleword.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->shipping_date }}</td>
                                        <td>{{ $sale->our_order_id }}</td>
                                        <td>{{ $sale->order_date }}</td>
                                        <td>{{ $sale->customer_name }}</td>
                                        <td>{{ $sale->product_name }}</td>
                                        <td>{{ $sale->product_model }}</td>
                                        <td class="text-center">
                                            <a href="#"
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('edit-sale', $sale->id) }}"
                                                        class="menu-link px-3">Edit</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('view-sale', $sale->id) }}"
                                                        class="menu-link px-3">View</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('createFile-sale', $sale->id) }}"
                                                        class="menu-link px-3">Add File</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('viewFile-sale', $sale->id) }}"
                                                        class="menu-link px-3">View Files</a>
                                                </div>
                                                <!--end::Menu item-->

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

@endsection

@section('javascript')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
    new DataTable('#kt_table_users', {
       

    }).on("draw", function () {
        handleSearchDatatable();
        KTMenu.createInstances();
        
    });
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }

</script>

@endsection
