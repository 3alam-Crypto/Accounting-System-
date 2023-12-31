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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    
        // Insert initial statuses
        DB::table('statuses')->insert([
            ['name' => 'Done'],
            ['name' => 'Cancel'],
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
        Schema::dropIfExists('statuses');
    }
};
