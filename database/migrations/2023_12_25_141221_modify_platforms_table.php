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
        Schema::table('platforms', function (Blueprint $table) {
            $table->dropColumn('ship_date');
            $table->boolean('shipment_status')->default(0);
            $table->boolean('sales_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('platforms', function (Blueprint $table) {
            $table->dropColumn('shipment_status');
            $table->dropColumn('sales_status');
        });

        // Re-add the ship_date column if needed
        Schema::table('platforms', function (Blueprint $table) {
            $table->integer('ship_date')->nullable();
        });
    }
};
