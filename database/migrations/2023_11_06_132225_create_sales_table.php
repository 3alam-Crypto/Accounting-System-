<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('platform_id')->default(0);
            $table->unsignedBigInteger('brand_id')->default(0);
            $table->unsignedBigInteger('country_id')->default(0);
            $table->string('vendor_invoice_number')->default('');
            $table->string('vendor_confirmation')->default('');
            $table->string('market_place_po')->default('');
            $table->date('shipping_date')->nullable();
            $table->string('our_order_id')->default('');
            $table->date('order_date')->nullable();
            $table->string('product_model')->default('');
            $table->string('product_name')->default('');
            $table->integer('quantity')->default(0);
            $table->string('customer_name')->default('');
            $table->string('customer_address')->default('');
            $table->string('city')->default('');
            $table->string('zip_code')->default('');
            $table->string('state')->nullable();
            $table->decimal('unit_price', 10, 2)->default(0);
            $table->decimal('special_shipping_cost', 10, 2)->default(0);
            $table->decimal('platform_tax', 10, 2)->default(0);
            $table->decimal('discount_percent', 5, 2)->default(0);
            $table->decimal('discount_value', 10, 2)->nullable();
            $table->decimal('total_net_received', 10, 2)->default(0);
            $table->decimal('platform_fee', 10, 2)->default(0);
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->decimal('additional_shipping', 10, 2)->default(0);
            $table->decimal('manufacturer_tax', 10, 2)->default(0);
            $table->decimal('other_cost', 10, 2)->default(0);
            $table->decimal('product_cost', 10, 2)->default(0);
            $table->decimal('gross_profit', 10, 2)->default(0);
            $table->decimal('gross_profit_percentage', 5, 2)->default(0);
            $table->date('due_date_shipping')->nullable();
            $table->string('tracking_number_1')->nullable();
            $table->string('tracking_number_2')->nullable();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
