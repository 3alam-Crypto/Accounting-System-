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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->decimal('salary', 10, 2);
            $table->date('start_date');
            $table->integer('payout_date');
            $table->date('birthdate');
            $table->unsignedBigInteger('country_id')->default(0);
            $table->string('department')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_file')->nullable();
            $table->string('citizen')->nullable();
            $table->date('contract_end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
