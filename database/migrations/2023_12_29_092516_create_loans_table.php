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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id')->default(0);
            $table->foreignId('loan_type_id')->constrained('loan_types');
            $table->decimal('installment_amount');
            $table->integer('installment_count');
            $table->decimal('amount');
            $table->boolean('status')->default(0);
            $table->date('due_date');
            $table->date('paid_date')->nullable();
            $table->decimal('charges');
            $table->decimal('due_charges');
            $table->string('period');
            $table->string('priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
