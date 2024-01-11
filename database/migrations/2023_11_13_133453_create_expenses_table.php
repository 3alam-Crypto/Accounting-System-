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
            $table->integer('group_id')->default(0);
            $table->foreignId('expenses_type_id')->constrained();
            $table->string('expenses_title')->nullable();
            $table->decimal('installment_amount')->nullable();
            $table->integer('installment_count')->nullable();
            $table->decimal('amount')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('due_date')->nullable();
            $table->date('paid_date')->nullable();
            $table->decimal('charges')->nullable();
            $table->string('period')->nullable();
            $table->string('priority')->nullable();
            $table->date('expense_date')->nullable();
            $table->boolean('is_installment')->default(0);
            $table->text('description')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('project_department')->nullable();
            $table->tinyInteger('approval_status')->default(0);
            $table->tinyInteger('expense_status')->default(0);
            $table->text('notes')->nullable();
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
