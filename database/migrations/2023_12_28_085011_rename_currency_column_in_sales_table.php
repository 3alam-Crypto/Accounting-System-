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
            $table->string('discount_type')->nullable()->after('discount_percent'); // Change 'after' to the appropriate position
        });
    
        // Copy data from `currency` to `discount_type` column
        DB::statement('UPDATE sales SET discount_type = currency');
    
        // Optionally, you might want to set some default value or handle null values in the new column.
    
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('currency');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->string('currency')->nullable()->after('discount_percent'); // Change 'after' to the appropriate position
        });
    
        // Copy data from `discount_type` to `currency` column
        DB::statement('UPDATE sales SET currency = discount_type');
    
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('discount_type');
        });
    }
};
