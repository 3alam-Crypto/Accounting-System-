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
        Schema::table('sales', function (Blueprint $table) {
            $table->boolean('tax_exempt')->default(0);
            $table->string('ramo_trading_order_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('billing_first_name')->nullable();
            $table->string('billing_last_name')->nullable();
            $table->string('billing_company_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_zip_code')->nullable();
            $table->string('billing_state')->nullable();
            $table->unsignedBigInteger('billing_country_id')->nullable();
            $table->string('note')->nullable();
            $table->string('tracking_number')->nullable();
            
            // Dropping columns
            $table->dropColumn('customer_name');
            $table->dropColumn('tracking_number_1');
            $table->dropColumn('tracking_number_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->string('customer_name')->default('');
            $table->string('tracking_number_1')->nullable();
            $table->string('tracking_number_2')->nullable();
            
            // Dropping added columns
            $table->dropColumn('tax_exempt');
            $table->dropColumn('ramo_trading_order_id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('company_name');
            $table->dropColumn('billing_first_name');
            $table->dropColumn('billing_last_name');
            $table->dropColumn('billing_company_name');
            $table->dropColumn('billing_address');
            $table->dropColumn('billing_city');
            $table->dropColumn('billing_zip_code');
            $table->dropColumn('billing_state');
            $table->dropForeign(['billing_country_id']);
            $table->dropColumn('billing_country_id');
            $table->dropColumn('note');
            $table->dropColumn('tracking_number');
        });
    }
};
