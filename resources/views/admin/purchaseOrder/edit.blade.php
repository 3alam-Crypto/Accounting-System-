@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h2>Edit Purchase Order</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('update-purchaseOrder', $purchaseOrder->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Brand Selection -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Brand Name</label>
                        <select id="brandSelector" class="form-select" name="brand_id" oninput="addBrand()">
                            <option selected disabled>Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $purchaseOrder->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Product Information -->
                <div id="products">
                    @if($purchaseOrder->products)
                    @foreach($purchaseOrder->products as $product)
                    <div class="row mb-3">
                        <input type="hidden" name="brand_id[]" value="{{ $product->brand_id }}">
                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name[]" value="{{ $product->product_name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity[]" value="{{ $product->quantity }}" oninput="calculateTotalQuantity()">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Product Price</label>
                            <input type="number" step="0.01" class="form-control" name="product_price[]" value="{{ $product->product_price }}" oninput="calculateTotalPrice()">
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-primary" onclick="addProduct()">Add Product</button><br><br>

                <!-- Customer Information -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>Customer Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Customer Name</label>
                                <input type="text" class="form-control" name="customer_name" value="{{ $purchaseOrder->customer_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Customer Email</label>
                                <input type="email" class="form-control" name="customer_email" value="{{ $purchaseOrder->customer_email }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Customer Phone</label>
                                <input type="text" class="form-control" name="customer_phone" value="{{ $purchaseOrder->customer_phone }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Customer City</label>
                                <input type="text" class="form-control" name="customer_city" value="{{ $purchaseOrder->customer_city }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Customer State</label>
                                <input type="text" class="form-control" name="customer_state" value="{{ $purchaseOrder->customer_state }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Customer Zip Code</label>
                                <input type="text" class="form-control" name="customer_zip_code" value="{{ $purchaseOrder->customer_zip_code }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Customer Company Name</label>
                                <input type="text" class="form-control" name="customer_company_name" value="{{ $purchaseOrder->customer_company_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Customer Address 1</label>
                                <input type="text" class="form-control" name="customer_address_1" value="{{ $purchaseOrder->customer_address_1 }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Customer Address 2</label>
                                <input type="text" class="form-control" name="customer_address_2" value="{{ $purchaseOrder->customer_address_2 }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Billing Address -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>Billing Address</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Billing Name</label>
                                <input type="text" class="form-control" name="billing_name" value="{{ $purchaseOrder->billing_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Billing Email</label>
                                <input type="email" class="form-control" name="billing_email" value="{{ $purchaseOrder->billing_email }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Billing Phone</label>
                                <input type="text" class="form-control" name="billing_phone" value="{{ $purchaseOrder->billing_phone }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Billing City</label>
                                <input type="text" class="form-control" name="billing_city" value="{{ $purchaseOrder->billing_city }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Billing State</label>
                                <input type="text" class="form-control" name="billing_state" value="{{ $purchaseOrder->billing_state }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Billing Zip Code</label>
                                <input type="text" class="form-control" name="billing_zip_code" value="{{ $purchaseOrder->billing_zip_code }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Billing Company Name</label>
                                <input type="text" class="form-control" name="billing_company_name" value="{{ $purchaseOrder->billing_company_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Billing Address 1</label>
                                <input type="text" class="form-control" name="billing_address_1" value="{{ $purchaseOrder->billing_address_1 }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Billing Address 2</label>
                                <input type="text" class="form-control" name="billing_address_2" value="{{ $purchaseOrder->billing_address_2 }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>Additional Information</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="form-label">Note</label>
                            <textarea class="form-control" name="note">{{ $purchaseOrder->note }}</textarea>
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Payment</label>
                            <input type="text" class="form-control" name="payment" value="{{ $purchaseOrder->payment }}">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Shipping</label>
                            <input type="text" class="form-control" name="shipping" value="{{ $purchaseOrder->shipping }}">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Total Quantity</label>
                            <input type="number" class="form-control" name="total_quantity" value="{{ $purchaseOrder->total_quantity }}" disabled>
                            <!-- Assuming it's for displaying, disabled here -->
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Total Price</label>
                            <input type="number" step="0.01" class="form-control" name="total_price" value="{{ $purchaseOrder->total_price }}" disabled>
                            <!-- Assuming it's for displaying, disabled here -->
                        </div>
                    </div>
                </div>

                <!-- Update and Cancel Buttons -->
                <div class="card mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

<script>
    // JavaScript function to add brand details
    function addBrand() {
        const brandSelector = document.getElementById('brandSelector');
        const selectedBrandId = brandSelector.value;
        const hiddenBrandIdInput = document.getElementById('hidden_brand_id');

        if (hiddenBrandIdInput) {
            hiddenBrandIdInput.value = selectedBrandId;
        }
    }

    // JavaScript function to add product details fields
    function addProduct() {
        const productsDiv = document.getElementById('products');
        const brandId = document.getElementById('hidden_brand_id').value;

        const productFields = `
            <div class="row mb-3">
                <input type="hidden" name="brand_id[]" value="${brandId}">
                <div class="col-md-6">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="product_name[]">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity[]" oninput="calculateTotalQuantity()">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Product Price</label>
                    <input type="number" step="0.01" class="form-control" name="product_price[]" oninput="calculateTotalPrice()">
                </div>
            </div>
        `;
        productsDiv.insertAdjacentHTML('beforeend', productFields);
    }

    // JavaScript function to calculate total quantity
    function calculateTotalQuantity() {
        const quantityInputs = document.querySelectorAll('input[name="quantity[]"]');
        let totalQuantity = 0;

        quantityInputs.forEach(input => {
            if (input.value !== '') {
                totalQuantity += parseInt(input.value);
            }
        });

        // Update the total quantity input field
        const totalQuantityInput = document.querySelector('input[name="total_quantity"]');
        const hiddenTotalQuantityInput = document.getElementById('hidden_total_quantity');

        if (totalQuantityInput && hiddenTotalQuantityInput) {
            totalQuantityInput.value = totalQuantity;
            hiddenTotalQuantityInput.value = totalQuantity;
        }
    }

    // JavaScript function to calculate total price
    function calculateTotalPrice() {
        const quantityInputs = document.querySelectorAll('input[name="quantity[]"]');
        const priceInputs = document.querySelectorAll('input[name="product_price[]"]');
        let totalPrice = 0;

        quantityInputs.forEach((input, index) => {
            if (input.value !== '' && priceInputs[index].value !== '') {
                const quantity = parseInt(input.value);
                const price = parseFloat(priceInputs[index].value);
                const productTotalPrice = quantity * price;
                totalPrice += productTotalPrice;
            }
        });

        // Update the total price input field
        const totalPriceInput = document.querySelector('input[name="total_price"]');
        const hiddenTotalPriceInput = document.getElementById('hidden_total_price');

        if (totalPriceInput && hiddenTotalPriceInput) {
            totalPriceInput.value = totalPrice.toFixed(2);
            hiddenTotalPriceInput.value = totalPrice.toFixed(2);
        }
    }
</script>
@endsection
