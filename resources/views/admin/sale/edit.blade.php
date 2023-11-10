@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="">Add Sale</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('update-sale', ['sale' => $sale->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="vendor_invoice_number">Vendor INVOICE NUMBER</label>
                                <input type="text" name="vendor_invoice_number" class="form-control" id="vendor_invoice_number" value="{{ $sale->vendor_invoice_number }}">
                            </div>
                            <div class="col-md-6">
                                <label for="vendor_confirmation">Vendor Confirmation</label>
                                <input type="text" name="vendor_confirmation" class="form-control" id="vendor_confirmation" value="{{ $sale->vendor_confirmation }}">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="name">Market Place PO</label>
                                <input type="text" name="market_place_po" class="form-control" id="market_place_po" value="{{ $sale->market_place_po }}">
                            </div>
                            <div class="col-md-6">
                                <label for="platform" class="block text-sm font-medium text-gray-700">Platform</label>
                                <div class="mb-3">
                                    <select name="platform_id" id="platform" autocomplete="platform-name" class="form-select">
                                        @foreach ($platforms as $platform)
                                        <option value="{{ $platform->id }}" {{ $platform->id === $sale->platform_id ? 'selected' : '' }}>{{ $platform->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Shipping Date</label>
                                <div class="mb-3">
                                    <input class="form-control" type="date" name="shipping_date" class="form-control" id="shipping_date" value="{{ $sale->shipping_date }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Our Order ID</label>
                                <input type="text" name="our_order_id" class="form-control" id="our_order_id" value="{{ $sale->our_order_id }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Order Date</label>
                                <div class="mb-3">
                                    <input class="form-control" type="date" name="order_date" class="form-control" id="order_date" value="{{ $sale->order_date }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Product Model</label>
                                <input type="text" name="product_model" class="form-control" id="product_model" value="{{ $sale->product_model }}">
                            </div>
                        </div>

                    
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="product_name" value="{{ $sale->product_name }}">
                            </div>

                            <div class="col-md-6">
                                <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                                <div class="mb-3">
                                    <select name="brand_id" id="brand" autocomplete="brand-name" class="form-select">
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id  === $sale->brand->id  ? 'selected' : '' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Customer Name</label>
                                <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{ $sale->customer_name }}">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Customer Address</label>
                                <input type="text" name="customer_address" class="form-control" id="customer_address" value="{{ $sale->customer_address }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">City</label>
                                <input type="text" name="city" class="form-control" id="city" value="{{ $sale->city }}">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Zip Code</label>
                                <input type="text" name="zip_code" class="form-control" id="zip_code" value="{{ $sale->zip_code }}">
                            </div>  
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">State</label>
                                <input type="text" name="state" class="form-control" id="state" value="{{ $sale->state }}">
                            </div>

                            <div class="col-md-6">
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <div class="mb-3">
                                    <select name="country_id" id="country" autocomplete="country-name" class="form-select">
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ $country->id  === $sale->country->id  ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                       
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Unit Price</label>
                                <input type="text" name="unit_price" class="form-control" id="unit_price" value="{{ $sale->unit_price }}" oninput="calculateTotalNetReceived(); calculateDiscount();">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Special Shipping cost</label>
                                <input type="text" name="special_shipping_cost" class="form-control" id="special_shipping_cost" value="{{ $sale->special_shipping_cost }}" oninput="calculateTotalNetReceived()">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Platform Tax</label>
                                <input type="text" name="platform_tax" class="form-control" id="special_shipping_cost" value="{{ $sale->platform_tax }}">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Discount Percent</label>
                                <input type="text" name="discount_percent" class="form-control" id="discount_percent" value="{{ $sale->discount_percent }}" oninput="calculateDiscount()">
                            </div>
                        </div>

                        
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Quantity</label>
                                <input type="text" name="quantity" class="form-control" id="quantity" value="{{ $sale->quantity }}" oninput="calculateTotalNetReceived(); calculateDiscount();">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Platform Fee</label>
                                <input type="text" name="platform_fee" class="form-control" id="platform_fee" value="{{ $sale->platform_fee }}" oninput="calculateGrossProfit()">
                            </div>
                        </div>


                        
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Shipping Cost</label>
                                <input type="text" name="shipping_cost" class="form-control" id="shipping_cost" value="{{ $sale->shipping_cost }}" oninput="calculateGrossProfit()">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Additional Shipping</label>
                                <input type="text" name="additional_shipping" class="form-control" id="additional_shipping" value="{{ $sale->additional_shipping }}" oninput="calculateGrossProfit()">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Manufacturer Tax</label>
                                <input type="text" name="manufacturer_tax" class="form-control" id="manufacturer_tax" value="{{ $sale->manufacturer_tax }}" oninput="calculateGrossProfit()">
                            </div>

                            <div class="col-md-6">
                                <label for="shipping_date">Other Cost</label>
                                <input type="text" name="other_cost" class="form-control" id="other_cost" value="{{ $sale->other_cost }}" oninput="calculateGrossProfit()">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="shipping_date">Product Cost</label>
                                <input type="text" name="product_cost" class="form-control" id="product_cost" value="{{ $sale->product_cost }}" oninput="calculateGrossProfit()">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label for="name">Total Net Received</label>
                        <input type="hidden" name="total_net_received" id="hidden_total_net_received" value="{{ $sale->total_net_received }}">
                        <input type="text" name="total_net_received" class="form-control" id="total_net_received" value="{{ $sale->total_net_received }}" disabled>
                        

                        <label for="name">Gross Profit</label>
                        <input type="hidden" name="gross_profit" id="hidden_gross_profit" value="{{ $sale->gross_profit }}">
                        <input type="text" name="gross_profit" class="form-control" id="gross_profit" value="{{ $sale->gross_profit }}" disabled>
                        

                        <label for="name">Gross Profit Percentage</label>
                        <input type="hidden" name="gross_profit_percentage" id="hidden_gross_profit_percentage" value="{{ $sale->gross_profit_percentage }}">
                        <input type="text" name="gross_profit_percentage" class="form-control" id="gross_profit_percentage" value="{{ $sale->gross_profit_percentage }}" disabled>
                        

                        <label for="name">Discount Value</label>
                        <input type="hidden" name="discount_value" id="hidden_discount_value" value="{{ $sale->discount_value }}">
                        <input type="text" name="discount_value" class="form-control" id="discount_value" value="{{ $sale->discount_value }}" disabled>
                        
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Sale</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function calculateTotalNetReceived() {
        const quantity = parseFloat(document.getElementById('quantity').value) || 1;
        const unitPrice = parseFloat(document.getElementById('unit_price').value) || 0;
        const specialShippingCost = parseFloat(document.getElementById('special_shipping_cost').value) || 0;

        const totalNetReceived = quantity * unitPrice + specialShippingCost;
       
        document.getElementById('total_net_received').value = isNaN(totalNetReceived) ? '' : totalNetReceived.toFixed(2);

        
        document.getElementById('hidden_total_net_received').value = isNaN(totalNetReceived) ? '' : totalNetReceived.toFixed(2);
    }

    function calculateGrossProfit() {
        const totalNetReceived = parseFloat(document.getElementById('total_net_received').value) || 0;
        const productCost = parseFloat(document.getElementById('product_cost').value) || 0;
        const otherCost = parseFloat(document.getElementById('other_cost').value) || 0;
        const manufacturerTax = parseFloat(document.getElementById('manufacturer_tax').value) || 0;
        const additionalShipping = parseFloat(document.getElementById('additional_shipping').value) || 0;
        const shippingCost = parseFloat(document.getElementById('shipping_cost').value) || 0;
        const platformFee = parseFloat(document.getElementById('platform_fee').value) || 0;

        const grossProfit = totalNetReceived - (productCost + otherCost + manufacturerTax + additionalShipping + shippingCost + platformFee);
        document.getElementById('gross_profit').value = isNaN(grossProfit) ? '' : grossProfit.toFixed(2);

        const grossProfitPercentage = (grossProfit / totalNetReceived) * 100;
        document.getElementById('gross_profit_percentage').value = isNaN(grossProfitPercentage) ? '' : grossProfitPercentage.toFixed(2) + '%';

        
        document.getElementById('hidden_gross_profit').value = isNaN(grossProfit) ? '' : grossProfit.toFixed(2);
        document.getElementById('hidden_gross_profit_percentage').value = isNaN(grossProfitPercentage) ? '' : grossProfitPercentage.toFixed(2);
    }

    function calculateDiscount() {
        const quantity = parseFloat(document.getElementById('quantity').value) || 1;
        const unitPrice = parseFloat(document.getElementById('unit_price').value) || 0;
        const discountPercent = parseFloat(document.getElementById('discount_percent').value) || 0;

        const discountAmount = (unitPrice * quantity * discountPercent) / 100;
        document.getElementById('discount_value').value = isNaN(discountAmount) ? '' : discountAmount.toFixed(2);

        document.getElementById('hidden_discount_value').value = isNaN(discountAmount) ? '' : discountAmount.toFixed(2);
    }
</script>


@endsection

