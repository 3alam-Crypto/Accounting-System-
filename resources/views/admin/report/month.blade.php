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
                            <!--begin::Daterangepicker-->
                            <form method="get" action="{{ route('monthly-report') }}" class="mb-3">
                                @csrf
                                <label for="month" style="margin-bottom: 8px;">Select Month:</label>
                                <div class="d-flex">
                                    <select name="month" id="month" class="form-select" style="margin-top: 8px;">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                        @endfor
                                    </select>
                                    <button type="submit" class="btn btn-primary ms-2">Show</button>
                                </div>
                            </form>
                            <!--end::Daterangepicker-->
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
                                    <a href="{{ route('monthly-report') }}" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as PDF</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Export dropdown-->
                        </div>
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
                                    @foreach ($platforms as $platform)
                                    <th class="min-w-75px">{{ $platform->name }}</th>
                                    @endforeach
                                    <th class="text-end min-w-75px">Total</th>
                                    <th class="text-end min-w-75px">GROSS MARGIN</th>
                                    <th class="text-end min-w-100px">%</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->name }}</td>
                                    @foreach ($platforms as $platform)
                                    <td class="text-end pe-0">
                                        {{ number_format($totals[$brand->id][$platform->id], 2) }}$
                                    </td>
                                    @endforeach
                                    <td class="text-end pe-0"> {{ number_format($brandTotals[$brand->id], 2) }}$ </td>
                                    <td class="text-end pe-0"> </td>
                                    <td class="text-end"></td>
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
