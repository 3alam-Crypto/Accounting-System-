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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expenses_type_id')->constrained();
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
        Schema::dropIfExists('expenses');
    }
};
