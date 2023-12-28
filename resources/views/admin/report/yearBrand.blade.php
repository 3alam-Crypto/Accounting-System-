@extends('layouts.master')

@section('content')

<div class="container">
    <div class="container-fluid px-4">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Export buttons-->
                            <div id="kt_ecommerce_report_sales_export" class="d-none"></div>
                            <!--end::Export buttons-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Export dropdown-->
                            <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-exit-up fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Export Report
                            </button>
                            <!--begin::Menu-->
                            <div id="kt_ecommerce_report_sales_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('export-brand-report') }}" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as PDF</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Export dropdown-->
                        </div>
                        <a href="{{ route('export-brand-report') }}"
                                    class="btn btn-sm fw-bold btn-primary px-4 py-2">Export</a>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table id="kt_table_users" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">Brand</th>
                                    @foreach ($months as $month => $monthName)
                                        <th>{{ $monthName }}</th>
                                        @if ($month % 3 == 0)
                                            <th>Q{{ $month / 3 }}</th>
                                        @endif
                                    @endforeach
                                    <th class="min-w-100px">Total</th>
                                    <th class="min-w-100px">Can</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->name }}</td>
                                        @foreach ($months as $month => $monthName)
                                            <td>{{ number_format($totals[$month][$brand->id], 2) }}</td>
                                            @if ($month % 3 == 0)
                                                <td>{{ number_format($brandTotals[$brand->id]['Q' . ($month / 3)], 2) }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ number_format($grandTotal['total'][$brand->id], 2) }}</td>
                                        <td>{{ number_format($grandTotal['total'][$brand->id] * 0.1 / 100, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
</div>

@endsection

@section('javascript')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
    new DataTable('#kt_table_users',{}).on("draw", function () {
        KTMenu.createInstances();
    });
</script>
@endsection
