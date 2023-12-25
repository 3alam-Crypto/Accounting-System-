@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    @if($errors->any())
        <div class="card card-warrning mt-4">
            <div class="card-header">
                <h1 class="">Warrning</h1>
            </div>
            <div class="card-body">

                <div class="alert alert-warrning">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>


            </div>
        </div>
    @endif

    <form action="{{ route('store-sale') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8">

                <div class="card  shadow-sm mt-4">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="vendor_invoice_number">Vendor INVOICE NUMBER</label>
                                <input type="text" name="vendor_invoice_number" class="form-control"
                                    id="vendor_invoice_number">
                            </div>
                            <div class="col-md-6">
                                <label for="vendor_confirmation">Vendor Confirmation</label>
                                <input type="text" name="vendor_confirmation" class="form-control"
                                    id="vendor_confirmation">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="name">Market Place PO</label>
                                <input type="text" name="market_place_po" class="form-control" id="market_place_po">
                            </div>
                            <div class="col-md-6">
                                <label for="platform" class="block text-sm font-medium text-gray-700">Platform</label>
                                <div class="mb-3">
                                    <select name="platform_id" id="platform" autocomplete="platform-name"
                                        class="form-select">
                                        @foreach($platforms as $platform)
                                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label>Shipping Date</label>
                                <div class="mb-3">
                                    <input class="form-control" type="date" name="shipping_date" class="form-control"
                                        id="shipping_date">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Vendor Order ID</label>
                                <input type="text" name="our_order_id" class="form-control" id="our_order_id">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label>Order Date</label>
                                <div class="mb-3">
                                    <input class="form-control" type="date" name="order_date" class="form-control"
                                        id="order_date">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Product Model</label>
                                <input type="text" name="product_model" class="form-control" id="product_model">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card  shadow-sm mt-4">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="product_name">
                            </div>

                            <div class="col-md-6">
                                <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                                <div class="mb-3">
                                    <select name="brand_id" id="brand" autocomplete="brand-name" class="form-select">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Unit Price</label>
                                <input type="text" name="unit_price" class="form-control" id="unit_price"
                                    oninput="calculateTotalNetReceived(); calculateDiscount();">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Special Shipping cost</label>
                                <input type="text" name="special_shipping_cost" class="form-control"
                                    id="special_shipping_cost" oninput="calculateTotalNetReceived()">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Platform Tax</label>
                                <input type="text" name="platform_tax" class="form-control" id="special_shipping_cost">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Discount Percent</label>
                                <input type="text" name="discount_percent" class="form-control" id="discount_percent"
                                    oninput="calculateDiscount()">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Quantity</label>
                                <input type="text" name="quantity" class="form-control" id="quantity"
                                    oninput="calculateTotalNetReceived(); calculateDiscount();">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Platform Fee</label>
                                <input type="text" name="platform_fee" class="form-control" id="platform_fee"
                                    oninput="calculateGrossProfit()">
                            </div>
                        </div>



                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Shipping Cost</label>
                                <input type="text" name="shipping_cost" class="form-control" id="shipping_cost"
                                    oninput="calculateGrossProfit()">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Additional Shipping</label>
                                <input type="text" name="additional_shipping" class="form-control"
                                    id="additional_shipping" oninput="calculateGrossProfit()">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Manufacturer Tax</label>
                                <input type="text" name="manufacturer_tax" class="form-control" id="manufacturer_tax"
                                    oninput="calculateGrossProfit()">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Other Cost</label>
                                <input type="text" name="other_cost" class="form-control" id="other_cost"
                                    oninput="calculateGrossProfit()">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Product Cost</label>
                                <input type="text" name="product_cost" class="form-control" id="product_cost"
                                    oninput="calculateGrossProfit()">
                            </div>

                            <div class="col-md-6">
                                <label for="due_date_shipping">Due Date Shipping</label>
                                <input type="date" name="due_date_shipping" class="form-control" id="due_date_shipping">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card  shadow-sm mt-4">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label>Status</label>
                                <select name="status_id" id="status_id" autocomplete="status-name" class="form-select">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="due_date_shipping">Ramo Trading Order Id</label>
                                <input type="text" name="ramo_trading_order_id" class="form-control"
                                    id="ramo_trading_order_id">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Note</label>
                            <textarea name="note" class="form-control"></textarea>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <input type="checkbox" name="tax_exempt" id="tax_exempt" class="status-checkbox"
                                    onclick="toggleTaxExempt()"
                                    {{ $sale->tax_exempt ? 'checked' : '' }}>
                                <label for="tax_exempt">Is Customer Tax Exempt</label>
                                <input type="hidden" name="hidden_tax_exempt" value="{{ $sale->tax_exempt }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="tracking_number">Tracking Number</label>
                                <input type="text" name="tracking_number" class="form-control" id="tracking_number">
                            </div>
                            <div class="col-md-6">
                                <label>Additional Tracking Numbers</label>
                                <div id="additionalTrackingNumbers">

                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="addTrackingNumberField()">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shipping Information -->
                <div class="card  shadow-sm mt-4">
                    <div class="card-header">
                        <h2 class="card-title">Shipping Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Customer Address</label>
                                <input type="text" name="customer_address" class="form-control" id="customer_address">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Customer City</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Zip Code</label>
                                <input type="text" name="zip_code" class="form-control" id="zip_code">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control" id="state">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <select name="country_id" id="country" autocomplete="country-name" class="form-select">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="company_name">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <input class="form-check-input" type="checkbox" name="Same_aaddress" id="Same_aaddress">
                                <label class="form-check-label" for="Same_aaddress">
                                    Same As Billing Address
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Billing Information -->
                <div class="card  shadow-sm mt-4">
                    <div class="card-header">
                        <h2 class="card-title">Billing Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="billing_first_name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="billing_last_name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" name="billing_address" class="form-control" id="billing_address">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="billing_city">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Zip Code</label>
                                <input type="text" name="billing_zip_code" class="form-control" id="billing_zip_code">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" name="billing_state" class="form-control" id="billing_state">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <select name="billing_country_id" id="billing_country_id" autocomplete="country-name"
                                    class="form-select">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="billing_company_name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card  shadow-sm mt-4">
                    <div class="card-body">
                        <label for="name">Total Net Received</label>
                        <input type="text" name="total_net_received" class="form-control" id="total_net_received"
                            disabled>
                        <input type="hidden" name="total_net_received" id="hidden_total_net_received">

                        <label for="name">Gross Profit</label>
                        <input type="text" name="gross_profit" class="form-control" id="gross_profit" disabled>
                        <input type="hidden" name="gross_profit" id="hidden_gross_profit">

                        <label for="name">Gross Profit Percentage</label>
                        <input type="text" name="gross_profit_percentage" class="form-control"
                            id="gross_profit_percentage" disabled>
                        <input type="hidden" name="gross_profit_percentage" id="hidden_gross_profit_percentage">

                        <label for="name">Discount Value</label>
                        <input type="text" name="discount_value" class="form-control" id="discount_value" disabled>
                        <input type="hidden" name="discount_value" id="hidden_discount_value">
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary form-control mt-4">Create Sale</button>
                </div>
            </div>
    </form>

</div>

<script>
    function calculateTotalNetReceived() {
        const quantity = parseFloat(document.getElementById('quantity').value) || 1;
        const unitPrice = parseFloat(document.getElementById('unit_price').value) || 0;
        const specialShippingCost = parseFloat(document.getElementById('special_shipping_cost').value) || 0;

        const totalNetReceived = quantity * unitPrice + specialShippingCost;
        document.getElementById('total_net_received').value = isNaN(totalNetReceived) ? '' : totalNetReceived.toFixed(
            2);


        document.getElementById('hidden_total_net_received').value = isNaN(totalNetReceived) ? '' : totalNetReceived
            .toFixed(2);
    }

    function calculateGrossProfit() {
        const totalNetReceived = parseFloat(document.getElementById('total_net_received').value) || 0;
        const productCost = parseFloat(document.getElementById('product_cost').value) || 0;
        const otherCost = parseFloat(document.getElementById('other_cost').value) || 0;
        const manufacturerTax = parseFloat(document.getElementById('manufacturer_tax').value) || 0;
        const additionalShipping = parseFloat(document.getElementById('additional_shipping').value) || 0;
        const shippingCost = parseFloat(document.getElementById('shipping_cost').value) || 0;
        const platformFee = parseFloat(document.getElementById('platform_fee').value) || 0;

        const grossProfit = totalNetReceived - (productCost + otherCost + manufacturerTax + additionalShipping +
            shippingCost + platformFee);
        document.getElementById('gross_profit').value = isNaN(grossProfit) ? '' : grossProfit.toFixed(2);

        const grossProfitPercentage = (grossProfit / totalNetReceived) * 100;
        document.getElementById('gross_profit_percentage').value = isNaN(grossProfitPercentage) ? '' :
            grossProfitPercentage.toFixed(2) + '%';


        document.getElementById('hidden_gross_profit').value = isNaN(grossProfit) ? '' : grossProfit.toFixed(2);
        document.getElementById('hidden_gross_profit_percentage').value = isNaN(grossProfitPercentage) ? '' :
            grossProfitPercentage.toFixed(2);
    }

    function calculateDiscount() {
        const quantity = parseFloat(document.getElementById('quantity').value) || 1;
        const unitPrice = parseFloat(document.getElementById('unit_price').value) || 0;
        const discountPercent = parseFloat(document.getElementById('discount_percent').value) || 0;

        const discountAmount = (unitPrice * quantity * discountPercent) / 100;
        document.getElementById('discount_value').value = isNaN(discountAmount) ? '' : discountAmount.toFixed(2);

        document.getElementById('hidden_discount_value').value = isNaN(discountAmount) ? '' : discountAmount.toFixed(2);
    }

    function toggleTaxExempt() {
        const checkbox = document.getElementById('tax_exempt');
        if (checkbox.checked) {
            checkbox.value = 1;
        } else {
            checkbox.value = 0;
        }
    }


    document.addEventListener('DOMContentLoaded', function () {
        const sameAddressCheckbox = document.getElementById('Same_aaddress');
        const shippingFields = {
            'billing_first_name': 'first_name',
            'billing_last_name': 'last_name',
            'billing_address': 'customer_address',
            'billing_city': 'city',
            'billing_zip_code': 'zip_code',
            'billing_state': 'state',
            'billing_country_id': 'country_id',
            'billing_company_name': 'company_name'
        };

        sameAddressCheckbox.addEventListener('change', function () {
            const shippingInfo = {};
            // Get shipping information
            Object.keys(shippingFields).forEach(key => {
                const shippingField = document.querySelector(`[name="${shippingFields[key]}"]`);
                if (shippingField) {
                    shippingInfo[key] = shippingField.value;
                }
            });

            const billingFields = Object.keys(shippingFields);

            if (sameAddressCheckbox.checked) {
                // Copy shipping information to billing information fields
                billingFields.forEach(key => {
                    const billingField = document.querySelector(`[name="${key}"]`);
                    if (billingField) {
                        billingField.value = shippingInfo[key];
                    }
                });
            } else {
                // Clear billing information fields if unchecked
                billingFields.forEach(key => {
                    const billingField = document.querySelector(`[name="${key}"]`);
                    if (billingField) {
                        billingField.value = '';
                    }
                });
            }
        });
    });

    function addTrackingNumberField() {
        const additionalTrackingNumbers = document.getElementById('additionalTrackingNumbers');

        // Create new input field and a delete button
        const newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'additional_tracking_number[]';
        newInput.className = 'form-control mb-2';

        const deleteButton = document.createElement('button');
        deleteButton.type = 'button';
        deleteButton.className = 'btn btn-danger ms-2 delete-button';
        deleteButton.innerText = '-';
        deleteButton.onclick = function () {
            additionalTrackingNumbers.removeChild(container);

            // Display the '+' button when deleting an input field
            addButton.style.display = 'inline-block';
        };

        const container = document.createElement('div');
        container.className = 'input-group mb-2';
        container.appendChild(newInput);
        container.appendChild(deleteButton);

        // Retrieve the '+' button
        const addButton = document.querySelector('.btn-primary');

        // Append the new input and delete button to the container
        additionalTrackingNumbers.appendChild(container);
    }
</script>


@endsection
