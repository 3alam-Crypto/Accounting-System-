<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            // Customer Information
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_state')->nullable();
            $table->string('customer_company_name')->nullable();
            $table->string('customer_address_1')->nullable();
            $table->string('customer_address_2')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_zip_code')->nullable();

            // Billing Information
            $table->string('billing_name')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_company_name')->nullable();
            $table->string('billing_address_1')->nullable();
            $table->string('billing_address_2')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_zip_code')->nullable();

            // Other Information
            $table->text('note')->nullable();
            $table->string('payment')->nullable();
            $table->string('shipping')->nullable();
            $table->integer('total_quantity')->nullable();
            $table->decimal('total_price', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
