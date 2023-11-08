@extends('layouts.master')

@section('content')

<div class="container">
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-body">
                <!--begin::Invoice 2 content-->
                <div class="mt-n1">
                    <!--begin::Wrapper-->
                    <div class="m-0">
                        <!--begin::Label-->
                        <div class="fw-bold fs-3 text-gray-800 mb-8">Our Order Id: {{ $sale->our_order_id }}</div>
                        <!--end::Label-->
                        <!--begin::Row-->
                        <div class="row g-5 mb-11">
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Order Date:</div>
                                <!--end::Label-->
                                <!--end::Col-->
                                <div class="fw-bold fs-6 text-gray-800">{{ $sale->order_date }}</div>
                                <!--end::Col-->
                            </div>
                            <!--end::Col-->
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Shipping Date:</div>
                                <!--end::Label-->
                                <!--end::Info-->
                                <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                    <span class="pe-2">{{ $sale->shipping_date }}</span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row g-5 mb-12">
                            <!--end::Col-->
                            <div class="col-sm-6">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Issue For:</div>
                                <!--end::Label-->
                                <!--end::Text-->
                                <div class="fw-bold fs-6 text-gray-800">{{ $sale->customer_name }}</div>
                                <!--end::Text-->
                                <!--end::Description-->
                                <div class="fw-semibold fs-7 text-gray-600">{{ $sale->country->id === $sale->country_id ? $sale->country->country_name : '' }}
                                    
                                    <br />{{ $sale->state }} , {{ $sale->city }} , {{ $sale->zip_code }}</div>
                                </div>
                                <!--end::Col-->
                                <!--end::Col-->
                                <!--end::Row-->
                                <!--begin::Content-->
                                <div class="flex-grow-1">
                                    <!--begin::Table-->
                                    <div class="table-responsive border-bottom mb-9">
                                        <table class="table mb-3">
                                            <thead>
                                                <tr class="border-bottom fs-6 fw-bold text-muted">
                                                    <th class="min-w-175px pb-2">Product Name</th>
                                                    <th class="min-w-70px text-end pb-2">Brand</th>
                                                    <th class="min-w-80px text-end pb-2">Model</th>
                                                    <th class="min-w-100px text-end pb-2">Qty</th>
                                                    <th class="min-w-100px text-end pb-2">Unit Price</th>
                                                    <th class="min-w-100px text-end pb-2">Product Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                    <td class="d-flex align-items-center">
                                                        <i class="fa fa-genderless text-success fs-2 me-2"></i>{{ $sale->product_name }}
                                                    </td>
                                                    <td>{{ $sale->brand->id === $sale->brand_id ? $sale->brand->name : '' }}</td>
                                                    <td>{{ $sale->product_model }}</td>
                                                    <td>{{ $sale->quantity }}</td>
                                                    <td>{{ $sale->unit_price }}</td>
                                                    <td class="fs-5 text-dark fw-bolder">${{ $sale->product_cost }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                    <!--begin::Container-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Section-->
                                        <div class="mw-300px">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountname-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Total Net Recived:</div>
                                                <!--end::Accountname-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->total_net_received }}</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountname-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Platform Fee</div>
                                                <!--end::Accountname-->
                                                <!--begin::Label-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->platform_fee }}</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Platform Tax</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->platform_tax }}</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Shipping Cost</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->special_shipping_cost }}</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Other Cost</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->other_cost }}</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Discount</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->discount_value }}</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Gross Profit</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->gross_profit }}</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Gross Profit Percentage</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">% {{ $sale->gross_profit_percentage }}</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                                    <!--end::Container-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Invoice 2 content-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection