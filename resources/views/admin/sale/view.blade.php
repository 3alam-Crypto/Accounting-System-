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
                        <!-- Include Actions -->
                        <div class="text-end">
                            <a href="#"
                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-duotone ki-down fs-5 ms-1"></i>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <!--begin::Menu items-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('create-sale') }}" class="menu-link px-3">Create sale</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="{{ route('edit-sale', $sale->id) }}" class="menu-link px-3">Edit</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="{{ route('createFile-sale', $sale->id) }}" class="menu-link px-3">Add File</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="{{ route('viewFile-sale', $sale->id) }}" class="menu-link px-3">View Files</a>
                                </div>
                                <!--end::Menu items-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!-- End Actions -->
                        
                        <!--begin::Label-->
                        <div class="row g-5 mb-12">
                            <div class="col-sm-5">
                                <div class="fw-bold fs-3 text-gray-800 mb-8">Our Order Id: {{ $sale->our_order_id }}</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="fw-bold fs-3 text-gray-800 mb-8">Ramo Trading Order Id: {{ $sale->ramo_trading_order_id }}</div>
                            </div>
                        </div>
                       
                        <!--end::Label-->
                        <div class="row g-5 mb-12">
                            <div class="col-sm-5">
                                <div class="fw-bold fs-3 text-gray-800 mb-8">Platform: {{ $sale->platform->name }}</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="fw-bold fs-3 text-gray-800 mb-8">Brand: {{ $sale->brand->name }}</div>
                            </div>
                            <div class="col-sm-3">
                                <div class="fw-bold fs-3 text-gray-800 mb-8">Status: {{ $sale->status->name }}</div>
                            </div>
                        </div>
                        <!--begin::Row-->

                        <div class="row g-5 mb-12">
                            <div class="col-sm-5">
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Vendor Invoice Number</div>
                                <div class="fw-bold fs-6 text-gray-800">{{ $sale->vendor_invoice_number }}</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Vendor Confirmation</div>
                                <div class="fw-bold fs-6 text-gray-800">{{ $sale->vendor_confirmation }}</div>
                            </div>
                            <!-- Add other fields similarly -->
                            <div class="col-sm-3">
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Marketplace PO</div>
                                <div class="fw-bold fs-6 text-gray-800">{{ $sale->market_place_po }}</div>
                            </div>
                        </div>
                        
                        <div class="row g-5 mb-12">
                            <!--end::Col-->
                            <div class="col-sm-5">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Order Date:</div>
                                <!--end::Label-->
                                <!--end::Col-->
                                <div class="fw-bold fs-6 text-gray-800">{{ $sale->order_date }}</div>
                                <!--end::Col-->
                            </div>
                            <!--end::Col-->
                            <!--end::Col-->
                            <div class="col-sm-4">
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

                            <div class="col-sm-3">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Due Date Shipping</div>
                                <!--end::Label-->
                                <!--end::Info-->
                                <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                    <span class="pe-2">{{ $sale->due_date_shipping }}</span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row g-5 mb-12">
                            <!--end::Col-->
                            <div class="col-sm-5">
                                <!--end::Label-->
                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Shipping Information:</div>
                                <!--end::Label-->
                                <!--end::Text-->
                                <div class="fw-bold fs-6 text-gray-800">{{ $sale->first_name }} {{ $sale->last_name }}</div>
                                <!--end::Text-->
                                <!--end::Description-->
                                <div class="fw-bold fs-6 text-gray-800">{{ $sale->country->id === $sale->country_id ? $sale->country->country_name : '' }}
                                    
                                    <br />{{ $sale->state }} , {{ $sale->city }} , {{ $sale->zip_code }}</div>
                                </div>
                                <!--end::Col-->
                                <!--end::Col-->
                                <!--end::Row-->

                                <div class="col-sm-4">
                                    <!-- Billing Information -->
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Billing Information:</div>
                                    <div class="fw-bold fs-6 text-gray-800">
                                        {{ $sale->billing_first_name }} {{ $sale->billing_last_name }}
                                    </div>
                                    <div class="fw-bold fs-6 text-gray-800">
                                        {{ $sale->country->id === $sale->billing_country_id ? $sale->country->country_name : '' }}
                                        <br />{{ $sale->billing_state }} , {{ $sale->billing_city }} , {{ $sale->billing_zip_code }}
                                    </div>
                                </div>
                                

                                <div class="col-sm-3">
                                    <div style="font-size: 20px; font-weight: bold; color: red;">NOTE:</div>
                                    <div style="font-size: 24px; font-weight: bold;">
                                        {{ $sale->note }}
                                    </div>
                                </div>
                                
                                
                                <!--end::Col-->
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
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Additional Shipping</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->additional_shipping }}</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Special Shipping Cost</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->special_shipping_cost }}</div>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Manufacturer Tax</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">$ {{ $sale->manufacturer_tax }}</div>
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

                                            <!--begin::Item-->
                                            <div class="d-flex flex-stack mb-3">
                                                <!--begin::Accountnumber-->
                                                <div class="fw-semibold pe-10 text-gray-600 fs-7">Tax Exempt</div>
                                                <!--end::Accountnumber-->
                                                <!--begin::Number-->
                                                <div class="text-end fw-bold fs-6 text-gray-800">@if($sale->tax_exempt == 0)
                                                    No
                                                @else
                                                    Yes
                                                @endif</div>
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