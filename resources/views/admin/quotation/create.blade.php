@extends('layouts.master')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h2>{{ __('keyword.Create Purchase Order') }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store-quotation') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Product Information -->
                <div id="products">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">{{ __('keyword.Brand Name') }}</label>
                            <select class="form-select" name="brand_id[]"">
                                <option selected disabled>Select Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('keyword.Product Name') }}</label>
                            <input type="text" class="form-control" name="product_name[]">
                        </div>
                    </div>
                    
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">{{ __('keyword.Quantity') }}</label>
                            <input type="number" class="form-control" name="quantity[]"">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('keyword.Product Price') }}</label>
                            <input type="number" step="0.01" class="form-control" name="product_price[]" oninput="calculateTotalPrice()">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">{{ __('keyword.Discount') }}</label>
                            <input type="number" class="form-control" name="discount[]" oninput="calculateTotalDiscount()">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">{{ __('keyword.Shipping Cost') }}</label>
                            <input type="number" class="form-control" name="shipping_cost[]"">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('keyword.Shipping Type') }}</label>
                            <input type="text" class="form-control" name="shipping_type[]">
                            <input type="hidden" name="shipping_type[]" id="hidden_shipping_type">
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" onclick="addProduct()">{{ __('keyword.Add Product') }}</button><br><br>
            
            
            <!-- Customer Information -->
            <div class="card mt-4">
                <div class="card-header">
                    <h2>{{ __('keyword.Customer Information') }}</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Customer Name') }}</label>
                                <input type="text" class="form-control" name="customer_name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Customer Email') }}</label>
                                <input type="email" class="form-control" name="customer_email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Customer Phone') }}</label>
                                <input type="text" class="form-control" name="customer_phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Customer City') }}</label>
                                <input type="text" class="form-control" name="customer_city">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Customer State') }}</label>
                                <input type="text" class="form-control" name="customer_state">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Customer Zip Code') }}</label>
                                <input type="text" class="form-control" name="customer_zip_code">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Customer Company Name') }}</label>
                            <input type="text" class="form-control" name="customer_company_name">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Customer Address 1') }}</label>
                            <input type="text" class="form-control" name="customer_address_1">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Customer Address 2') }}</label>
                            <input type="text" class="form-control" name="customer_address_2">
                        </div>
                    </div>
                </div>

                <!-- Billing Address -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>{{ __('keyword.Billing Address') }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Billing Name') }}</label>
                                <input type="text" class="form-control" name="billing_name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Billing Email') }}</label>
                                <input type="email" class="form-control" name="billing_email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Billing Phone') }}</label>
                                <input type="text" class="form-control" name="billing_phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Billing City') }}</label>
                                <input type="text" class="form-control" name="billing_city">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Billing State') }}</label>
                                <input type="text" class="form-control" name="billing_state">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('keyword.Billing Zip Code') }}</label>
                                <input type="text" class="form-control" name="billing_zip_code">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Billing Company Name') }}</label>
                            <input type="text" class="form-control" name="billing_company_name">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Billing Address 1') }}</label>
                            <input type="text" class="form-control" name="billing_address_1">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Billing Address 2') }}</label>
                            <input type="text" class="form-control" name="billing_address_2">
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h2>{{ __('keyword.Additional Information') }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Quotation Type') }}</label>
                            <input type="text" class="form-control" name="quotation_type">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Note') }}</label>
                            <textarea class="form-control" name="note"></textarea>
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.valid') }}</label>
                            <input type="text" class="form-control" name="valid">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Payment') }}</label>
                            <input type="text" class="form-control" name="payment">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Total Price') }}</label>
                            <input type="number" step="0.01" class="form-control" name="total_price" disabled>
                            <input type="hidden" name="total_price" id="hidden_total_price">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Total Tax') }}</label>
                            <input type="number" step="0.01" class="form-control" name="total_tax" disabled>
                            <input type="hidden" name="total_tax" id="hidden_total_tax">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Shipping Cost') }}</label>
                            <input type="number" step="0.01" class="form-control" name="shipping_cost" disabled>
                            <input type="hidden" name="shipping_cost" id="hidden_shipping_cost">
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">{{ __('keyword.Total discount') }}</label>
                            <input type="number" step="0.01" class="form-control" name="total_discount" disabled>
                            <input type="hidden" name="total_discount" id="hidden_total_discount">
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <button type="submit" class="btn btn-primary">{{ __('keyword.Save') }}</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

<script>


let productCount = 1;
function addProduct() {
    const productsDiv = document.getElementById('products');
    productCount++;

    const firstShippingTypeInput = document.querySelector('input[name="shipping_type[]"]');
    const shippingTypeValue = firstShippingTypeInput.value || '';


    const productFields = `
    <h2>Product ${productCount}</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Brand Name</label>
                <select class="form-select" name="brand_id[]"">
                    <option selected disabled>Select Brand</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="product_name[]">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity[]">
            </div>
            <div class="col-md-6">
                <label class="form-label">Product Price</label>
                <input type="number" step="0.01" class="form-control" name="product_price[]" oninput="calculateTotalPrice()">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Discount</label>
                <input type="number" class="form-control" name="discount[]" oninput="calculateTotalDiscount()"> 
            </div>
            <div class="col-md-6">
                <label class="form-label">Shipping Cost</label>
                <input type="number" class="form-control" name="shipping_cost[]">
            </div>
            <input type="hidden" class="form-control" name="shipping_type_hidden[]" value="${shippingTypeValue}">
        </div>
    `;
    productsDiv.insertAdjacentHTML('beforeend', productFields);
}


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

    const totalPriceInput = document.querySelector('input[name="total_price"]');
    const hiddenTotalPriceInput = document.getElementById('hidden_total_price');

    if (totalPriceInput && hiddenTotalPriceInput) {
        totalPriceInput.value = totalPrice.toFixed(2);
        hiddenTotalPriceInput.value = totalPrice.toFixed(2);
    }
}



function calculateTotalDiscount() {
    const discountInputs = document.querySelectorAll('input[name="discount[]"]');
    let totalDiscount = 0;

    discountInputs.forEach(input => {
        if (input.value !== '') {
            totalDiscount += parseInt(input.value);
        }
    });

    const totalDiscountInput = document.querySelector('input[name="total_discount"]');
    const hiddenTotalDiscountInput = document.getElementById('hidden_total_discount');

    if (totalDiscountInput && hiddenTotalDiscountInput) {
        totalDiscountInput.value = totalDiscount;
        hiddenTotalDiscountInput.value = totalDiscount;
    }
}

</script>
@endsection
