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
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                            }
                            .header {
                                font-size: 18px;
                                font-weight: bold;
                            }
                            .info {
                                font-size: 14px;
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-bottom: 20px;
                            }
                            table, th, td {
                                border: 1px solid #000;
                            }
                            th, td {
                                padding: 10px;
                                text-align: left;
                            }
                        </style>
                    </head>
                    <body>
                        <div>
                            <div class="text-end">
                                <td class="text-center">
                                    <a
                                    href="#"
                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                    data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                </a>
                                <!--begin::Menu-->
                                <div
                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a
                                            href="{{ route('download-quotation-pdf', ['id' => $quotation->id]) }}"
                                            class="menu-link px-3">Download</a>
                                    </div>
                                </div>
                                <!--end::Menu-->
                            </td>
                            </div>
                            <p class="header">QUOTATION</p>
                            <p class="info">To: Ramo Trading & Consulting Inc.<br>
                                8 Fair valley, Coto De Casa, CA 92679<br>
                                <a href="www.ramotrading.com">www.ramotrading.com</a> | Phone +1 (833) 669-0944</p>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Brand</th>
                                        <th>Date</th>
                                        <th>SKU/Ref</th>
                                        <th>Description</th>
                                        <th>QTY</th>
                                        <th>U Price</th>
                                        <th>T. Price $</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quotation->quotationProducts  as $product)
                                        <tr>
                                            <td>{{ $product->brand->name }}</td>
                                            <td>{{ $product->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td>{{ $product->sku_ref }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->total_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>Total</td>
                                        <td>{{ $quotation->total_quantity }}</td>
                                        <td>{{ $quotation->total_price }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>Discount</td>
                                        <td colspan="2">{{ $quotation->total_discount }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>Shipping</td>
                                        <td colspan="2">{{ $quotation->shipping_cost }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>Tax ({{ $quotation->tax_rate }}%)</td>
                                        <td colspan="2">{{ $quotation->total_tax }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td>Grand Total</td>
                                        <td colspan="2">{{ $quotation->grand_total }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <p class="header">Shipping Address</p>
                            <p class="info">
                                {{ $quotation->customer_address_1 }}, {{ $quotation->customer_city }}, {{ $quotation->customer_state }}, {{ $quotation->customer_zip_code }}
                            </p>
                            <p class="header">Billing Address</p>
                            <p class="info">
                                @if ($quotation->billing_same_as_shipping)
                                    Same as Shipping address
                                @else
                                    {{ $quotation->billing_address_1 }}, {{ $quotation->billing_city }}, {{ $quotation->billing_state }}, {{ $quotation->billing_zip_code }}
                                @endif
                            </p>
                            <p class="info">Payment: {{ $quotation->payment }}</p>
                            <p class="info">Valid: {{ $quotation->valid }} Days</p>
                            <p class="info">We would sincerely like to thank you for doing business with us.</p>
                            <p class="info">Kind Regards,</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection