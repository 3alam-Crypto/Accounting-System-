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
        Schema::table('statuses', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
        });

        // Insert new statuses
        DB::table('statuses')->insert([
            ['name' => 'Pending'],
            ['name' => 'Paid'],
            ['name' => 'Return'],
            ['name' => 'Refund'],
            ['name' => 'Partial-Cancel'],
            ['name' => 'Partial-Return'],
            ['name' => 'Partial-Refund'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statuses', function (Blueprint $table) {
            //
        });
    }
};
